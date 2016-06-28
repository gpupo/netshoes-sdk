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

    protected function getDetail($skuId, $type)
    {
        $response = $this->perform($this->factoryMap('get'.$type, ['sku' => $skuId]));
        $className = 'Gpupo\NetshoesSdk\Entity\Product\Sku\\'.$type;
        $data = $this->processResponse($response);

        $o = new $className($data->toArray());

        $this->getLogger()->addInfo('Detail', [
            'sku'       => $skuId,
            'typ'       => $type,
            'response'  => $data,
            'className' => $className,
            'object'    => $o,
        ]);

        return $o;
    }

    public function saveDetail(EntityInterface $sku, $type)
    {
        return $this->execute($this->factoryMap('save'.$type, ['sku' => $sku->getId()]), $sku->toJson($type));
    }

    public function hydrate(EntityInterface $sku)
    {
        $sku->setPrice($this->getDetail($skuId, 'Price'))
            ->setPriceSchedule($this->getDetail($skuId, 'PriceSchedule'))
            ->setStock($this->getDetail($skuId, 'Stock'))
            ->setStatus($this->getDetail($skuId, 'Status'));

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

        return $this->execute($m, $entity->toJson());
    }
}
