<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\NetshoesSdk\Entity\Templates;

use Gpupo\CommonSdk\Traits\PoolTrait;
use Gpupo\NetshoesSdk\Entity\ManagerAbstract;

class Manager extends ManagerAbstract
{
    use PoolTrait;

    protected $entity = 'Templates';

    public $maps = [
        'brands' => ['GET', '/brands'],
        'flavors' => ['GET', '/flavors'],
        'colors' => ['GET', '/colors'],
        'sizes' => ['GET', '/sizes'],
        'departments' => ['GET', '/bus/{buId}/departments'],
        'productTypes' => ['GET', '/department/{departmentCode}/productType'],
        'attributes' => ['GET', '/department/{departmentCode}/productType/{productTypeCode}/templates'],
    ];
}
