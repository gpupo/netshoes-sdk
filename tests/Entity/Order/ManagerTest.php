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

use Gpupo\NetshoesSdk\Client\Client;
use Gpupo\NetshoesSdk\Entity\Order\Manager;
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\NetshoesSdk\Entity\Order\OrderCollection;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Shipping;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = 'item.json')
    {
        $manager = $this->getFactory()->factoryManager('order');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Order/'.$filename));

        return $manager;
    }

    protected function commonAsserts(Order $order)
    {
        $this->assertSame('111111', $order->getOrderNumber());
        $this->assertSame('111111', $order->getId());
        $this->assertSame(1, $order->getShipping()->getShippingCode());
    }
    /**
     * @testdox Administra operações de SKUs
     * @test
     */
    public function testManager()
    {
        $manager = $this->getManager('list.json');

        $this->assertInstanceOf(Manager::class, $manager);

        return $manager;
    }

    /**
     * @depends testManager
     * @covers ::getClient
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf(Client::class, $manager->getClient());
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
        $this->assertInstanceOf(OrderCollection::class, $list);

        $this->assertSame(1, $list->count());

        foreach ($list as $order) {
            $this->commonAsserts($order);
        }

        return $list;
    }

    /**
     * @testdox Get a order based on order number
     * @covers ::findById
     * @covers ::execute
     * @covers ::factoryMap
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function testFindBy()
    {
        $manager = $this->getManager('item.json');
        $order = $manager->findById(111111);
        $this->assertInstanceOf(Order::class, $order);
        $this->commonAsserts($order);
    }
    /**
     * @testdox A atualização de status falha quando status não reconhecido
     * @test
     * @dataProvider dataProviderOrders
     * @expectedException InvalidArgumentException
     * @covers ::factoryDecorator
     * @covers ::updateStatus
     */
    public function updateStatusFail(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('abductee');
        $manager->updateStatus($order);
    }

    /**
     * @testdox Update the shipping status to Approved
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     * @covers ::factoryDecorator
     * @covers ::updateStatus
     */
    public function saveStatusToApproved(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('approved');
        $this->assertSame(200, $manager->updateStatus($order)->getHttpStatusCode());
    }

    /**
     * @testdox Falha ao tentar mover o status de um pedido para invoiced sem informar NF
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     * @covers ::updateStatus
     * @expectedException InvalidArgumentException
     */
    public function saveStatusToInvoicedFail(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('invoiced');
        $manager->updateStatus($order);
    }

    /**
     * @testdox Update the shipping status to Invoiced
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::updateStatus
     * @covers ::factoryMap
     */
    public function saveStatusToInvoiced(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('invoiced');

        $invoice = new Invoice([
            'number'    => 4003,
            'line'      => 1,
            'accessKey' => '1789616901235555001000004003000004003',
            'issueDate' => '2016-05-10T09:44:54.000-03:00',
        ]);

        $order->getShipping()->setInvoice($invoice);

        $this->assertSame(200, $manager->updateStatus($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to Canceled - Require ``Shipping Cancellation Reason``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::updateStatus
     * @covers ::factoryMap
     */
    public function saveStatusToCanceled(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('canceled');
        $order->getShipping()->setCancellationReason('Solicitação do cliente');
        $this->assertSame(200, $manager->updateStatus($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to Delivered - Require ``Transport Delivery Date``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::updateStatus
     * @covers ::factoryMap
     */
    public function saveStatusToDelivered(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('delivered');
        $order->getShipping()->getTransport()->setDeliveryDate('2016-05-10T09:44:54.000-03:00');
        $this->assertSame(200, $manager->updateStatus($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to Shipped - Require ``Transport Info``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::updateStatus
     * @covers ::factoryMap
     */
    public function saveStatusToShipped(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('delivered');
        $order->getShipping()->getTransport()->setDeliveryDate('2016-05-10T09:44:54.000-03:00');
        $this->assertSame(200, $manager->updateStatus($order)->getHttpStatusCode());
    }
}
