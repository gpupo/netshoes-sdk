<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\NetshoesSdk\Entity\AbstractMetadata;

class SkuCollection extends AbstractMetadata
{
    protected function getKey()
    {
        return 'items';
    }

    protected function factoryEntity(array $data)
    {
        return new Item($data);
    }
}
