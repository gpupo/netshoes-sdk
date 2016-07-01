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

use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Decorator\AbstractDecorator
 */
abstract class AbstractDecoratorTestCase extends TestCaseAbstract
{
    protected function getExpectedArray()
    {
        return $this->getResourceJson('fixture/Order/Status/'.$this->target.'.json');
    }

    protected function getExpectedJson()
    {
        return $this->getResourceContent('fixture/Order/Status/'.$this->target.'.json');
    }

    protected function getDecorator($data = [])
    {
        return $this->factory($data)->setLogger($this->getLogger());
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
     * @testdox Falha ao validar ``Order`` com informações mínimas requeridas ausentes
     * @test
     */
    public function validateFail()
    {
        $decorator = $this->getDecorator();

        $this->assertFalse($decorator->validate());
    }

    /**
     * @testdox Falha ao tentar submeter uma ordem incompleta para mudança de status
     * @expectedException Exception
     * @test
     */
    public function toArrayFail()
    {
        $this->getDecorator()->toJson();
    }

    /**
     * @testdox Tem sucesso ao validar as informações mínimas requeridas para uma mudança de status
     * @test
     * @dataProvider dataProviderOrders
     */
    public function validate(Order $order)
    {
        return $this->markTestIncomplete();
        $decorator = $this->getDecorator($this->getExpectedArray())->setOrder($order);

        $this->assertTrue($decorator->validate());
    }

    /**
     * @testdox Prepara as informações como de acordo com o pedido na mudança de status
     * @test
     * @dataProvider dataProviderOrders
     */
    public function toArray(Order $order)
    {
        return $this->markTestIncomplete();

        $decorator = $this->getDecorator($this->getExpectedArray())->setOrder($order);

        $this->assertSame($this->getExpectedArray(), $decorator->toArray());
        $this->assertSame($this->getExpectedJson(), $decorator->toJson());
    }
}
