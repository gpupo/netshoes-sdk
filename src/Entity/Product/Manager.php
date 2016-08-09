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

namespace Gpupo\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Exception\InvalidArgumentException;
use Gpupo\CommonSdk\Exception\RuntimeException;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\NetshoesSdk\Entity\AbstractManager;
use Gpupo\NetshoesSdk\Factory;

final class Manager extends AbstractManager
{
    use TranslatorManagerTrait;

    protected $entity = 'Product';

    protected $strategy = [
        'info' => false,
    ];

    /**
     * @codeCoverageIgnore
     */
    protected $maps = [
        'save'       => ['POST', '/products'],
        'findById'   => ['GET', '/products/{itemId}'],
        'patch'      => ['PATCH', '/products/{itemId}'],
        'update'     => ['PUT', '/products/{itemId}'],
        'fetch'      => ['GET', '/products?page={offset}&size={limit}'],
        'statusById' => ['GET', '/skus/{itemId}/bus/{buId}/status'],
    ];

    public function patch(EntityInterface $entity, $compare)
    {
        if (empty($compare)) {
            return false;
        }

        $json = json_encode($entity->toPatch($compare));
        $map = $this->factoryMap('patch', ['itemId' => $entity->getId()]);
        $operation = $this->execute($map, $json);

        $feedback = [
            'fields'        => $compare,
            'response_code' => $operation->getHttpStatusCode(),
        ];

        $this->log('info', 'Operação de Atualização de produto (PATCH)', $feedback);

        return $feedback;
    }

    protected function resolveNew(EntityInterface $entity)
    {
        $this->save($entity);

        return [
            'created' => true,
        ];
    }

    public function fetchStatusById($itemId)
    {
        $response = $this->perform($this->factoryMap('statusById', [
            'itemId' => $itemId,
        ]));

        $data = $this->processResponse($response);

        if (empty($data)) {
            return;
        }

        return new Status($data->toArray());
    }

    private function skuManager()
    {
        return $this->factorySubManager(Factory::getInstance(), 'sku');
    }

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {
        if (0 === $entity->getSkus()->count()) {
            throw new InvalidArgumentException('Product precisa conter SKU!');
        }

        try {
            $status = $entity->get('status');
            if (!$status instanceof Status) {
                $status = $this->fetchStatusById($entity->getId());
            }

            if (true === $status->isPending()) {
                return ['pending' => true];
            }
        } catch (RuntimeException $e) {
            if (404 === $e->getCode()) {
                return $this->resolveNew($entity);
            }
        }

        $response = [];

        if (true === $this->strategy['info']) {
            $compare = $this->attributesDiff($entity, $existent, ['department', 'productType']);
            $response['patch'] = $this->patch($entity, $compare);
        }

        $response['skus'] = [];

        foreach ($entity->getSkus() as $sku) {
            $previous = null;

            if ($existent instanceof EntityInterface) {
                $previous = $existent->getSkus()->findById($sku->getId());
            }

            $response['skus'][] = $this->skuManager()->update($sku, $previous);
        }

        return $response;
    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }

    public function findById($itemId)
    {
        $product = parent::findById($itemId);

        if (empty($product)) {
            return false;
        }

        $sm = $this->skuManager();
        $product->getSkus()->forAll(function ($key, $element) use ($sm) {
            $sm->hydrate($element);
        });

        return $product;
    }
}
