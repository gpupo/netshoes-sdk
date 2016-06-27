<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class PriceSchedule extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'priceFrom' => 'number',
            'priceTo'   => 'number',
            'dateInit'  => 'number',
            'dateEnd'   => 'number',
        ];
    }

    protected function setUp()
    {
        $this->setOptionalSchema(['priceFrom', 'dateInit', 'dateEnd']);
    }
}
