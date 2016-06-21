<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\CollectionAbstract;

class Skus extends CollectionAbstract
{
    public function factoryElement($data)
    {
        return new Sku\Item($data);
    }
}
