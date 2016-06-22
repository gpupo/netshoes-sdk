<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\NetshoesSdk\Entity\Templates;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Traits\PoolTrait;
use Gpupo\NetshoesSdk\Entity\ManagerAbstract;

class Manager extends ManagerAbstract
{
    use PoolTrait;

    protected $entity = 'Templates';

    protected $maps = [
        'brands'        => ['GET', '/brands'],
    ];

    public function getBrands()
    {
        $response = $this->perform($this->factoryMap('brands'));
        $p = $this->processResponse($response);

        return $this->fetchPrepare($p);
    }

}
