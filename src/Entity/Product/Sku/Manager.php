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
use Gpupo\NetshoesSdk\Entity\AbstractManager;

class Manager extends AbstractManager
{
    protected $entity = 'SkuCollection';

    protected $maps = [
        'save'              => ['POST', '/products/{productId}/skus'], //Create a new sku for a product
        'findSkuById'       => ['GET', '/products/{productId}/skus/{itemId}'], // Get the a sku by product Id and sku Id
        'update'            => ['PUT', '/products/{productId}/skus/{itemId}'], //Update a product based on SKU
        'findById'          => ['GET', '/products/{itemId}/skus'], //Get the list of product skus
        'saveStatus'        => ['PUT', '/skus/{sku}/bus/{buId}/status'], //Enable or disable sku for sale
        'savePriceSchedule' => ['POST', '/skus/{sku}/priceSchedules'], //Save a price schedule
        'getPriceSchedule'  => ['GET', '/skus/{sku}/priceSchedules'], //Get PriceSchedule
        'getPrice'          => ['GET', '/skus/{sku}/prices'], //Get a base price
        'savePrice'         => ['PUT', '/skus/{sku}/prices'], //Save a base price
        'saveStock'         => ['PUT', '/skus/{sku}/stocks'], //Update stock quantity by sku
        'getStock'          => ['GET', '/skus/{sku}/stocks'], //Get Stock
        'saveStatus'        => ['GET', '/skus/{sku}/bus/{buId}/status'], //Save Status
        'getStatus'         => ['GET', '/skus/{sku}/bus/{buId}/status'], //Get Status
    ];

    public function save(EntityInterface $product, $route = 'save')
    {
        return $this->execute($this->factoryMap($route), $product->toJson());
    }

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|null
     */
    public function findSkuById($itemId)
    {
        $response = $this->perform($this->factoryMap('findSkuById', [
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

        $this->getLogger()->addInfo('Detail', [
            'sku'       => $sku->getId(),
            'typ'       => $type,
            'response'  => $data,
            'className' => $className,
            'object'    => $o,
        ]);

        return $o;
    }

    public function saveDetail(Item $sku, $type)
    {
        $json = $sku->toJson($type);
        $map = $this->factoryMap('save'.$type, ['sku' => $sku->getId()]);

        return $this->execute($map, $json);
    }

    protected function hydrate(EntityInterface $sku)
    {
        $sku->setPrice($this->getDetail($sku, 'Price'))
            ->setPriceSchedule($this->getDetail($sku, 'PriceSchedule'))
            ->setStock($this->getDetail($sku, 'Stock'))
            ->setStatus($this->getDetail($sku, 'Status'));

        return $sku;
    }

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {
        parent::update($entity, $existent);

        $m = $this->factoryMap('update', [
            'productId' => $entity->getId(),
            'itemId'    => $entity->getId(),
        ]);

        $response = [
            'sku'      => $entity->getId(),
            'bypassed' => [],
            'updated'  => [],
            'code'     => [],
        ];

        foreach ([
            'Status' => ['active'],
            'Stock' => ['available'],
            'Price' => ['price'],
            'PriceSchedule' => ['priceTo'],
        ] as $key => $attributes) {
            $getter = 'get'.$key;
            $diff = $this->attributesDiff($entity->$getter(), $existent->$getter(), $attributes);
            if (!empty($diff)) {
                $response['code'][$key] = $this->saveDetail($entity, $key)->getHttpStatusCode();

                $response['updated'][] = $key;
            } else {
                $response['bypassed'][] = $key;
            }
        }

        $this->log('info', 'Operação de Atualização de entity '
            .$this->entity, $response);

        return $response;
    }
}
