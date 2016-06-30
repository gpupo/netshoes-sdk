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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order;

use Gpupo\NetshoesSdk\Entity\Order\Manager;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = null)
    {
        $manager = $this->getFactory()->factoryManager('order');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Order/list.json'));

        return $manager;
    }

    /**
     * @testdox Administra operações de SKUs
     * @test
     */
    public function testManager()
    {
        $manager = $this->getManager();

        $this->assertInstanceOf(Manager::class, $manager);

        return $manager;
    }

    /**
     * @depends testManager
     * @covers ::getClient
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Client\Client', $manager->getClient());
    }

    /**
     * @testdox Get a list of Orders
     * @test
     * @depends testManager
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function fetch(Manager $manager)
    {
        $list = $manager->fetch();
        $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Order\OrderCollection', $list);

        return $list;
    }

    /**
     * @testdox Get a order based on order number.
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function findById()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testdox Get a list of shippings by order number
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function fetchShippings()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testdox Get a shipping based on order number and shipping code
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function findShippingById()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testdox Update the shipping status to Approved
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function saveStatusToApproved()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testdox Update the shipping status to Canceled
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function saveStatusToCanceled()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testdox Update the shipping status to Delivered
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function saveStatusToDelivered()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testdox Update the shipping status to Invoiced
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function saveStatusToInvoiced()
    {
        $this->markTestIncomplete();
    }

    /**
     * @testdox Update the shipping status to Shipped
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function saveStatusToShipped()
    {
        $this->markTestIncomplete();
    }
}
