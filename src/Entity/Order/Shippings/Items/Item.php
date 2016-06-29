<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Order\Shippings\Items;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Item extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = '';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'brand'                    => 'string',
            'color'                    => 'string',
            'departmentCode'           => 'integer',
            'departmentName'           => 'string',
            'discountUnitValue'        => 'number',
            'ean'                      => 'string',
            'flavor'                   => 'string',
            'grossUnitValue'           => 'number',
            'itemId'                   => 'integer',
            'manufacturerCode'         => 'string',
            'name'                     => 'string',
            'netUnitValue'             => 'number',
            'quantity'                 => 'number',
            'size'                     => 'string',
            'sku'                      => 'string',
            'status'                   => 'string',
            'totalCommission'          => 'number',
            'totalDiscount'            => 'number',
            'totalFreight'             => 'number',
            'totalGross'               => 'number',
            'totalNet'                 => 'number',
            'checkInData'              => 'string',
            'devolutionData'           => 'string',
            'devolutionExchangeStatus' => 'string',
            'exchangeProcessCode'      => 'integer',
        ];
    }
}
