<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\NetshoesSdk\Entity\Product\Attributes;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Attribute extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'name'  => 'string',
            'value' => 'string',
        ];
    }
}
