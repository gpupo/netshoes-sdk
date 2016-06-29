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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Shippings;

use Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Items;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ItemsTest extends TestCaseAbstract
{
    /**
     * @testdox É uma coleção de objetos ``Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Item``
     */
    public function testFactoryElement()
    {
        $o = new Items(
            [
                [
                    'brand'             => 'string',
                    'color'             => 'string',
                    'departmentCode'    => 1,
                    'departmentName'    => 'string',
                    'discountUnitValue' => 2.1,
                    'ean'               => 'string',
                    'flavor'            => 'string',
                    'grossUnitValue'    => 43.21,
                    'itemId'            => 993882,
                    'manufacturerCode'  => 'string',
                    'name'              => 'string',
                    'netUnitValue'      => 872.1,
                    'quantity'          => 0.22,
                    'size'              => 'string',
                    'sku'               => 'string',
                    'status'            => 'string',
                    'totalCommission'   => 772.11,
                    'totalDiscount'     => 876.11,
                    'totalFreight'      => 11.1,
                    'totalGross'        => 11.0,
                    'totalNet'          => 0.11,
                ],
            ]
        );

        foreach ($o as $s) {
            $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Item', $s);
        }
    }
}
