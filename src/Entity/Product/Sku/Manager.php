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
        'update'            => ['PUT', '/products/{productId}/skus/{sku}/{itemId}'], //Update a product based on SKU
        'findById'          => ['GET', '/products/{itemId}/skus'], //Get the list of product skus
        'saveStatus'        => ['PUT', '/skus/{sku}/bus/{buId}/status'], //Enable or disable sku for sale
        'savePriceSchedule' => ['POST', '/skus/{sku}/priceSchedules'], //Save a price schedule
        'savePrice'         => ['PUT', '/skus/{sku}/prices'], //Save a base price
        'saveStock'         => ['PUT', '/skus/{sku}/stocks'], //Update stock quantity by sku
    ];

    public function save(EntityInterface $product, $route = 'save')
    {
        return $this->execute($this->factoryMap('save'), $product->toJson());
    }
}
