<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\NetshoesSdk\Entity\ManagerAbstract;

class Manager extends ManagerAbstract
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
        'getStatus'          => ['GET', '/skus/{sku}/bus/{buId}/status'], //Get Status
    ];

    public function save(EntityInterface $product, $route = 'save')
    {
        return $this->execute($this->factoryMap($route), $product->toJson());
    }

    protected function getDetail($skuId, $type)
    {
        $response = $this->perform($this->factoryMap('get'.$type, ['sku' => $skuId]));
        $className = 'Gpupo\NetshoesSdk\Entity\Product\Sku\\'.$type;

        return new $className($this->processResponse($response));
    }

    public function getDetailsById($skuId)
    {
        return [
            'price'         => $this->getDetail($skuId, 'Price'),
            'priceSchedule' => $this->getDetail($skuId, 'PriceSchedule'),
            'stock'         => $this->getDetail($skuId, 'Stock'),
            'status'         => $this->getDetail($skuId, 'Status'),
        ];
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

        return $this->execute($m, $entity->toJson());
    }
}
