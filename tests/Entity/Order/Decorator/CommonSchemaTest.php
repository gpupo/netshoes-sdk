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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Decorator;

use Gpupo\NetshoesSdk\Entity\Order\Decorator\CommonSchema;
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Decorator\CommonSchema
 */
class CommonSchemaTest extends TestCaseAbstract
{
    protected function factory()
    {
        return new CommonSchema();
    }

    /**
     * @testdox Recebe o objeto ``Order``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::setOrder
     */
    public function setOrder(Order $order)
    {
        $decorator = $this->factory()->setOrder($order);
        $this->assertInstanceOf(Order::class, $decorator->getOrder());

        $decorator->toArray();
    }

    /**
     * @testdox Possui output [Trading](https://github.com/gpupo/common-schema#schemas)
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::toArray
     */
    public function toArray(Order $order)
    {
        $decorator = $this->factory()->setOrder($order);
        $this->assertInternalType('array', $decorator->toArray());
    }
}
