<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Exception\ManagerException;
use Gpupo\NetshoesSdk\Entity\AbstractManager;

class Manager extends AbstractManager
{
    protected $entity = 'Sku';

    protected $strategy = [
        'info'    => false,
        'pricing' => 'simples',
    ];

    /**
     * @codeCoverageIgnore
     */
    protected function setUp()
    {
        $this->maps = include 'map.config.php';
    }

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|null
     */
    public function findById($itemId)
    {
        $response = $this->perform($this->factoryMap('findById', [
            'productId' => $itemId,
            'itemId'    => $itemId,
        ]));

        $data = $this->processResponse($response);

        if (empty($data)) {
            return;
        }

        $sku = new Item($data->toArray());

        return $this->hydrate($sku);
    }

    protected function getDetail(EntityInterface $sku, $type)
    {
        $response = $this->perform($this->factoryMap('get'.$type, ['sku' => $sku->getId()]));
        $className = 'Gpupo\NetshoesSdk\Entity\Product\Sku\\'.$type;
        $data = $this->processResponse($response);

        $o = new $className($data->toArray());

        $this->log('info', 'Detail', [
            'sku'       => $sku->getId(),
            'typ'       => $type,
            'response'  => $data,
            'className' => $className,
            'object'    => $o,
        ]);

        return $o;
    }

    protected function getPriceScheduleCollection(EntityInterface $sku)
    {
        try {
            $response = $this->perform($this->factoryMap('getPriceSchedule', ['sku' => $sku->getId()]));
            $data = $this->processResponse($response);

            if (empty($data)) {
                throw new ManagerException('No price schedule on SKU #'.$sku->getId());
            }
        } catch (ManagerException $e) {
            $this->log('error', $e->getMessage());

            return;
        }

        $collection = new PriceScheduleCollection($data->toArray());

        return $collection;
    }

    public function add(EntityInterface $entity, $productId)
    {
        return $this->execute($this->factoryMap('add', [
            'productId' => $productId,
        ]), $entity->toJson());
    }

    public function saveDetail(Item $sku, $type)
    {
        $json = $sku->toJson($type);
        $map = $this->factoryMap('save'.$type, ['sku' => $sku->getId()]);

        return $this->execute($map, $json);
    }

    protected function hydratePriceSchedule(EntityInterface $sku)
    {
        $ps = $this->getPriceScheduleCollection($sku);

        $sku->setPriceSchedule(false);
        if ($ps instanceof PriceScheduleCollection) {
            $sku->setPriceSchedule($ps->getCurrent());
        }

        return $sku;
    }

    public function hydrate(EntityInterface $sku)
    {
        $sku->setPrice($this->getDetail($sku, 'Price'))
            ->setStock($this->getDetail($sku, 'Stock'))
            ->setStatus($this->getDetail($sku, 'Status'));

        return $this->hydratePriceSchedule($sku);
    }

    protected function resolvePrevious(Item $entity)
    {
        try {
            $p = $this->findById($entity->getId());
            if ($p instanceof Item) {
                return $p;
            }
        } catch (\Exception $e) {
            throw new \Exception('Sku #'.$entity->getId().' not found on marketplace!');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {
        parent::update($entity, $existent);

        if (empty($existent)) {
            $existent = $this->resolvePrevious($entity);
        }

        $response = [
            'sku'      => $entity->getId(),
            'bypassed' => [],
            'code'     => [],
            'updated'  => [],
        ];

        $list = [
            'updateDetails',
        ];

        if (true === $this->strategy['info']) {
            $list[] = 'updateInfo';
        }

        foreach ($list as $method) {
            $response = $this->$method($entity, $existent, $response);
        }

        $this->log('info', 'Operação de Atualização', $response);

        return $response;
    }

    public function updateInfo(Item $entity, $existent = null, array $response = [])
    {
        $compare = $this->attributesDiff($entity, $existent, ['name', 'color',
            'size', 'gender', 'eanIsbn', 'images', 'video', 'height',
            'width', 'depth', 'weight', ]);

        if (false === $compare) {
            $response['bypassed'][] = 'info';

            return $response;
        }

        $map = $this->factoryMap('update', ['itemId' => $entity->getId(), 'sku' => $entity->getId()]);
        $operation = $this->execute($map, $entity->toJson());
        $response['code']['info'] = $operation->getHttpStatusCode();
        $response['updated'][] = 'info';

        return $response;
    }

    public function updateDetails(Item $entity, Item $existent = null, array $response = [])
    {
        $list = [
            'Status' => ['active'],
            'Stock'  => ['available'],
            'Price'  => ['price'],
        ];

        if ($this->strategy['pricing'] === 'schedule') {
            $list['PriceSchedule'] = ['priceTo'];
        }

        foreach ($list as $key => $attributes) {
            $getter = 'get'.$key;

            if (!empty($existent)) {
                if (false === $this->attributesDiff($entity->$getter(), $existent->$getter(), $attributes)) {
                    $response['bypassed'][] = $key;
                    continue;
                }
            }

            $response['code'][$key] = $this->saveDetail($entity, $key)->getHttpStatusCode();
            $response['updated'][] = $key;
        }

        return $response;
    }
}
