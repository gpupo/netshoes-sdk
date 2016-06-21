<?php

/*
 * This file is part of gpupo/netshoes-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/netshoes-sdk/>.
 */
namespace Gpupo\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 */
class Product extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'productId';

    public function getSchema()
    {
        return [
            'productId'     => 'string',
            'skus'          => 'object',
            'department'    => 'string',
            'productType'   => 'string',
            'brand'         => 'string',
            'attributes'    => 'object',
            'links'         => 'object',
        ];
    }
}
