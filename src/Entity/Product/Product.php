<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * Product Entity.
 *
 * @method string getProductId()    Acesso a productId
 * @method setProductId(string $productId)    Define productId
 * @method Gpupo\NetshoesSdk\Entity\Product\Skus getSkus()    Acesso a skus
 * @method setSkus(Gpupo\NetshoesSdk\Entity\Product\Skus $skus)    Define skus
 * @method string getDepartment()    Acesso a department
 * @method setDepartment(string $department)    Define department
 * @method string getProductType()    Acesso a productType
 * @method setProductType(string $productType)    Define productType
 * @method string getBrand()    Acesso a brand
 * @method setBrand(string $brand)    Define brand
 * @method Gpupo\NetshoesSdk\Entity\Product\Attributes\Attributes getAttributes()    Acesso a attributes
 * @method setAttributes(Gpupo\NetshoesSdk\Entity\Product\Attributes\Attributes $attributes)    Define attributes
 */
class Product extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'productId';

    public function getSchema()
    {
        return [
            'productId'   => 'string',
            'skus'        => 'object',
            'department'  => 'string',
            'productType' => 'string',
            'brand'       => 'string',
            'attributes'  => 'object',
            //'links'         => 'object',
        ];
    }
}
