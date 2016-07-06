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

use Gpupo\NetshoesSdk\Entity\Order\Shippings\Shipping;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Shippings;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Shippings\Shippings
 */
class ShippingsTest extends TestCaseAbstract
{
    /**
     * @testdox É uma coleção de objetos ``Gpupo\NetshoesSdk\Entity\Order\Shippings\Shipping``
     */
    public function testFactoryElement()
    {
        $o = new Shippings(
            [
                [
                    'shippingCode'  => 1,
                    'freightAmount' => 1.1,
                ],
            ]
        );

        foreach ($o as $s) {
            $this->assertInstanceOf(Shipping::class, $s);
        }

        return $o;
    }

    /**
     * @testdox Possui métodos especiais para output de informações
     * @depends testFactoryElement
     * @covers ::toLog
     */
    public function testOutput(Shippings $object)
    {
        $this->assertTrue(is_array($object->toLog()));
        $this->assertTrue(is_array($object->toArray()));
        $this->assertInternalType('string', $object->__toString());
    }
}
