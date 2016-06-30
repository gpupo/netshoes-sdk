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

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\NetshoesSdk\Entity\Order\Decorator\DecoratorInterface;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Decorator\AbstractDecorator
 */
class AbstractDecoratorTest extends TestCaseAbstract
{
    protected function getExpectedArray()
    {
        return $this->getResourceJson('fixture/Order/Status/'. $this->target.'.json');
    }

    protected function getExpectedJson()
    {
        return $this->getResourceContent('fixture/Order/Status/'. $this->target.'.json');
    }

    protected function factory()
    {
    }

    /**
     * @testdox Recebe o objeto ``Order``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::setOrder
     */
    public function setOrder(Order $order)
    {
        $this->assertInstanceOf(Order::class, $this->factory()
            ->setOrder($order)->getOrder());
    }

    /**
     * @testdox Tem sucesso ao validar as informações mínimas requeridas para uma mudança de status
     * @test
     * @dataProvider dataProviderOrders
     */
    public function validate(Order $order)
    {
        $decorator = $this->factory()->setOrder($order);

        $this->assertTrue($decorator->validate());
    }

    /**
     * @testdox Falha ao validar ``Order`` com informações mínimas requeridas ausentes
     * @test
     */
    public function validateFail()
    {
        $decorator = $this->factory();

        $this->assertFalse($decorator->validate());
    }

    /**
     * @testdox Prepara as informações como de acordo com o pedido na mudança de status
     * @test
     * @dataProvider dataProviderOrders
     */
    public function toArray(Order $order)
    {
        $decorator = $this->factory()->setOrder($order);

        $this->assertSame($this->getExpectedArray(), $decorator->toArray());
        $this->assertSame($this->getExpectedJson(), $decorator->toJson());
    }

    /**
     * @testdox Falha ao tentar submeter uma ordem incompleta para mudança de status
     * @expectedException Exception
     * @test
     */
    public function toArrayFail()
    {
        $this->factory()->toJson();
    }

}
