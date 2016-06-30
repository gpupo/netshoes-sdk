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

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    /**
     * @testdox Get a list of Orders
     * @test
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function fetch()
    {
        $this->markTestIncomplete();
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
