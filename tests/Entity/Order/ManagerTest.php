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

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\NetshoesSdk\Client\Client;
use Gpupo\NetshoesSdk\Entity\Order\Manager;
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\NetshoesSdk\Entity\Order\OrderCollection;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Shipping;
use Gpupo\NetshoesSdk\Entity\Order\Translator;
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
     * @testdox Get a empty list of Orders
     * @test
     * @covers \Gpupo\NetshoesSdk\Entity\AbstractManager::findById
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function fetchNotFound()
    {
        $manager = $this->getManager('notfound.json');
        $this->assertFalse($manager->findById(1001));
    }

    /**
     * @testdox Get a list of Common Schema Orders
     * @test
     * @depends testManager
     * @covers ::translatorFetch
     * @covers \Gpupo\NetshoesSdk\Entity\Order\Translator::translateTo
     */
    public function translatorFetch(Manager $manager)
    {
        $list = $manager->translatorFetch(0, 50, ['orderStatus' => 'approved']);
        $this->assertInstanceOf(TranslatorDataCollection::class, $list);

        $this->assertSame(1, $list->count());

        foreach ($list as $order) {
            $this->assertInstanceOf(TranslatorDataCollection::class, $order);
        }

        return $list;
    }

    /**
     * @testdox Get a list of most recent Common Schema Orders
     * @test
     * @depends testManager
     * @covers ::fetchQueue
     * @covers \Gpupo\NetshoesSdk\Entity\Order\Translator::translateTo
     */
    public function fetchQueue(Manager $manager)
    {
        $list = $manager->fetchQueue();
        $this->assertInstanceOf(TranslatorDataCollection::class, $list);
        $this->assertSame(1, $list->count());
        foreach ($list as $order) {
            $this->assertInstanceOf(TranslatorDataCollection::class, $order);
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
     * @covers ::update
     */
    public function updateStatusFail(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('abductee');
        $manager->update($order);
    }

    /**
     * @testdox Update Common Schema Order the shipping status to Approved
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::translatorUpdate
     */
    public function translatorUpdate(Order $order)
    {
        $order->setOrderStatus('approved');
        $manager = $this->getManager();
        $translator = new Translator(['native' => $order]);
        $foreign = $translator->translateTo();
        $this->assertSame(200, $manager->translatorUpdate($foreign)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to Approved
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     * @covers ::factoryDecorator
     * @covers ::update
     */
    public function saveStatusToApproved(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('approved');
        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Falha ao tentar mover o status de um pedido para invoiced sem informar NF
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     * @covers ::update
     * @expectedException InvalidArgumentException
     */
    public function saveStatusToInvoicedFail(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('invoiced');
        $manager->update($order);
    }

    /**
     * @testdox Update the shipping status to Invoiced
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
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

        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to Canceled - Require ``Shipping Cancellation Reason``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
     * @covers ::factoryMap
     */
    public function saveStatusToCanceled(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('canceled');
        $order->getShipping()->setCancellationReason('Solicitação do cliente');
        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to Delivered - Require ``Transport Delivery Date``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
     * @covers ::factoryMap
     */
    public function saveStatusToDelivered(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('delivered');
        $order->getShipping()->getTransport()->setDeliveryDate('2016-05-10T09:44:54.000-03:00');
        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to Shipped - Require ``Transport Info``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
     * @covers ::factoryMap
     */
    public function saveStatusToShipped(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('shipped');

        $transport = $this->getFactory()->createTransport([
            'carrier'               => 'Correios',
            'trackingNumber'        => 'PJ521644335BR',
            'shipDate'              => '2016-05-10T10:46:00.000-03:00',
            'estimatedDeliveryDate' => '2016-05-10T10:46:00.000-03:00',
        ]);

        $order->getShipping()->setTransport($transport);
        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Pedido em situação ``Shipped`` possui Invoice
     * @test
     */
    public function fetchShippedInvoiced()
    {
        $manager = $this->getManager('shipped.json');
        $id = '11263255514';
        $order = $manager->findById($id);
        $invoice = $order->getShipping()->getInvoice();
        $this->assertSame($id, $order->getId());
        $this->assertSame([
            'number'    => '',
            'line'      => 0,
            'accessKey' => '4233371852869900012255001001955271085166950',
            'issueDate' => 1469664202000,
            'shipDate'  => 1468275993000,
            'url'       => '',
        ], $invoice->toArray());

        $this->assertSame('2016-07-27T21:03:22.000-03:00', $invoice->getIssueDate());
        $this->assertSame('2016-07-11T19:26:33.000-03:00', $invoice->getShipDate());

        return $order;
    }

    /**
     * @testdox Pedido em situação ``Shipped`` possui Transport
     * @depends fetchShippedInvoiced
     * @test
     */
    public function fetchShippedTransport(Order $order)
    {
        $transport = $order->getShipping()->getTransport();
        $this->assertSame([
            'carrier'               => 'Correios',
            'deliveryDate'          => '',
            'estimatedDeliveryDate' => '',
            'deliveryService'       => 'Normal',
            'shipDate'              => 1469664000000,
            'trackingLink'          => 'http://rastreamento.ns2online.com.br/DU164795539BR',
            'trackingNumber'        => 'DU164795539BR',
            'trackingShipDate'      => 1469739449000,
        ], $transport->toArray());

        $this->assertSame('2016-07-27T21:00:00.000-03:00', $transport->getShipDate());
        $this->assertSame('2016-07-28T17:57:29.000-03:00', $transport->getTrackingShipDate());
    }
}
