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

use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Items;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Shipping;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Order
 */
class OrderTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Order\Order';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'agreedDate'          => 'string',
            'businessUnit'        => 'string',
            'devolutionRequested' => false,
            'exchangeRequested'   => true,
            'orderDate'           => 'string',
            'orderNumber'         => 'string',
            'orderStatus'         => 'string',
            'orderType'           => 'string',
            'originNumber'        => 'string',
            'originSite'          => 'string',
            'paymentDate'         => 'string',
            'shippings'           => 'object',
            'totalCommission'     => 1.1,
            'totalDiscount'       => 2.1,
            'totalFreight'        => 2.0,
            'totalGross'          => 99.6,
            'totalNet'            => 1.11,
            'totalQuantity'       => 71.0,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getShipping()`` que é um atalho para ``->getShippings()->first()``
     * @dataProvider dataProviderObject
     * @cover ::getShipping
     * @test
     */
    public function getShipping(Order $order, $expected = null)
    {
        $this->assertInstanceOf(Shipping::class, $order->getShipping());
    }

    /**
     * @testdox Falha ao acessar ``getShipping()`` quando não houver nenhum objeto
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage Shipping Missed!
     * @dataProvider dataProviderOrders
     */
    public function failShipping(Order $order)
    {
        $order->getShippings()->clear();
        $order->getInvoice();
    }

    /**
     * @testdox Possui método ``getInvoice()`` que é um atalho para ``->getShippings()->first()->getInvoice()``
     * @dataProvider dataProviderObject
     * @cover ::getInvoice
     * @test
     */
    public function getInvoice(Order $order, $expected = null)
    {
        $this->assertInstanceOf(Invoice::class, $order->getInvoice());
    }

    /**
     * @testdox Possui método ``setInvoice()`` que é um atalho para ``->getShippings()->first()->setInvoice()``
     * @dataProvider dataProviderObject
     * @cover ::setInvoice
     * @test
     */
    public function setInvoice(Order $order, $expected = null)
    {
        $order->setInvoice(false);
        $this->assertNotInstanceOf(Invoice::class, $order->setInvoice());

        $invoice = new Invoice([
            'number'    => 'string',
            'line'      => 1,
            'accessKey' => 'string',
            'issueDate' => 'string',
            'shipDate'  => 'string',
            'url'       => 'string',
        ]);

        $order->setInvoice($invoice);
        $this->assertInstanceOf(Invoice::class, $order->getInvoice());
    }

    /**
     * @testdox Possui método ``getItems()`` que é um atalho para ``->getShippings()->first()->getItems()``
     * @dataProvider dataProviderObject
     * @cover ::getItems
     * @test
     */
    public function getItems(Order $order, $expected = null)
    {
        $this->assertInstanceOf(Items::class, $order->getItems());
    }

    /**
     * @testdox Possui método ``getAgreedDate()`` para acessar AgreedDate
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getAgreedDate
     * @test
     */
    public function getterAgreedDate(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('agreedDate', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setAgreedDate()`` que define AgreedDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setAgreedDate
     * @test
     */
    public function setterAgreedDate(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('agreedDate', 'string', $order);
    }

    /**
     * @testdox Possui método ``getBusinessUnit()`` para acessar BusinessUnit
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getBusinessUnit
     * @test
     */
    public function getterBusinessUnit(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('businessUnit', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setBusinessUnit()`` que define BusinessUnit
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setBusinessUnit
     * @test
     */
    public function setterBusinessUnit(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('businessUnit', 'string', $order);
    }

    /**
     * @testdox Possui método ``getDevolutionRequested()`` para acessar DevolutionRequested
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getDevolutionRequested
     * @test
     */
    public function getterDevolutionRequested(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('devolutionRequested', 'boolean', $order, $expected);
    }

    /**
     * @testdox Possui método ``setDevolutionRequested()`` que define DevolutionRequested
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setDevolutionRequested
     * @test
     */
    public function setterDevolutionRequested(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('devolutionRequested', 'boolean', $order);
    }

    /**
     * @testdox Possui método ``getExchangeRequested()`` para acessar ExchangeRequested
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getExchangeRequested
     * @test
     */
    public function getterExchangeRequested(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('exchangeRequested', 'boolean', $order, $expected);
    }

    /**
     * @testdox Possui método ``setExchangeRequested()`` que define ExchangeRequested
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setExchangeRequested
     * @test
     */
    public function setterExchangeRequested(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('exchangeRequested', 'boolean', $order);
    }

    /**
     * @testdox Possui método ``getOrderDate()`` para acessar OrderDate
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getOrderDate
     * @test
     */
    public function getterOrderDate(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('orderDate', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setOrderDate()`` que define OrderDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setOrderDate
     * @test
     */
    public function setterOrderDate(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('orderDate', 'string', $order);
    }

    /**
     * @testdox Possui método ``getOrderNumber()`` para acessar OrderNumber
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getOrderNumber
     * @test
     */
    public function getterOrderNumber(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('orderNumber', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setOrderNumber()`` que define OrderNumber
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setOrderNumber
     * @test
     */
    public function setterOrderNumber(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('orderNumber', 'string', $order);
    }

    /**
     * @testdox Possui método ``getOrderStatus()`` para acessar OrderStatus
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getOrderStatus
     * @test
     */
    public function getterOrderStatus(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('orderStatus', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setOrderStatus()`` que define OrderStatus
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setOrderStatus
     * @test
     */
    public function setterOrderStatus(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('orderStatus', 'string', $order);
    }

    /**
     * @testdox Possui método ``getOrderType()`` para acessar OrderType
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getOrderType
     * @test
     */
    public function getterOrderType(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('orderType', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setOrderType()`` que define OrderType
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setOrderType
     * @test
     */
    public function setterOrderType(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('orderType', 'string', $order);
    }

    /**
     * @testdox Possui método ``getOriginNumber()`` para acessar OriginNumber
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getOriginNumber
     * @test
     */
    public function getterOriginNumber(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('originNumber', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setOriginNumber()`` que define OriginNumber
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setOriginNumber
     * @test
     */
    public function setterOriginNumber(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('originNumber', 'string', $order);
    }

    /**
     * @testdox Possui método ``getOriginSite()`` para acessar OriginSite
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getOriginSite
     * @test
     */
    public function getterOriginSite(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('originSite', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setOriginSite()`` que define OriginSite
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setOriginSite
     * @test
     */
    public function setterOriginSite(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('originSite', 'string', $order);
    }

    /**
     * @testdox Possui método ``getPaymentDate()`` para acessar PaymentDate
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getPaymentDate
     * @test
     */
    public function getterPaymentDate(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('paymentDate', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setPaymentDate()`` que define PaymentDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setPaymentDate
     * @test
     */
    public function setterPaymentDate(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('paymentDate', 'string', $order);
    }

    /**
     * @testdox Possui método ``getShippings()`` para acessar Shippings
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getShippings
     * @test
     */
    public function getterShippings(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('shippings', 'object', $order, $expected);
    }

    /**
     * @testdox Possui método ``setShippings()`` que define Shippings
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setShippings
     * @test
     */
    public function setterShippings(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('shippings', 'object', $order);
    }

    /**
     * @testdox Possui método ``getTotalCommission()`` para acessar TotalCommission
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getTotalCommission
     * @test
     */
    public function getterTotalCommission(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('totalCommission', 'number', $order, $expected);
    }

    /**
     * @testdox Possui método ``setTotalCommission()`` que define TotalCommission
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setTotalCommission
     * @test
     */
    public function setterTotalCommission(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('totalCommission', 'number', $order);
    }

    /**
     * @testdox Possui método ``getTotalDiscount()`` para acessar TotalDiscount
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getTotalDiscount
     * @test
     */
    public function getterTotalDiscount(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('totalDiscount', 'number', $order, $expected);
    }

    /**
     * @testdox Possui método ``setTotalDiscount()`` que define TotalDiscount
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setTotalDiscount
     * @test
     */
    public function setterTotalDiscount(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('totalDiscount', 'number', $order);
    }

    /**
     * @testdox Possui método ``getTotalFreight()`` para acessar TotalFreight
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getTotalFreight
     * @test
     */
    public function getterTotalFreight(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('totalFreight', 'number', $order, $expected);
    }

    /**
     * @testdox Possui método ``setTotalFreight()`` que define TotalFreight
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setTotalFreight
     * @test
     */
    public function setterTotalFreight(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('totalFreight', 'number', $order);
    }

    /**
     * @testdox Possui método ``getTotalGross()`` para acessar TotalGross
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getTotalGross
     * @test
     */
    public function getterTotalGross(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('totalGross', 'number', $order, $expected);
    }

    /**
     * @testdox Possui método ``setTotalGross()`` que define TotalGross
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setTotalGross
     * @test
     */
    public function setterTotalGross(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('totalGross', 'number', $order);
    }

    /**
     * @testdox Possui método ``getTotalNet()`` para acessar TotalNet
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getTotalNet
     * @test
     */
    public function getterTotalNet(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('totalNet', 'number', $order, $expected);
    }

    /**
     * @testdox Possui método ``setTotalNet()`` que define TotalNet
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setTotalNet
     * @test
     */
    public function setterTotalNet(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('totalNet', 'number', $order);
    }

    /**
     * @testdox Possui método ``getTotalQuantity()`` para acessar TotalQuantity
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getTotalQuantity
     * @test
     */
    public function getterTotalQuantity(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('totalQuantity', 'number', $order, $expected);
    }

    /**
     * @testdox Possui método ``setTotalQuantity()`` que define TotalQuantity
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::setTotalQuantity
     * @test
     */
    public function setterTotalQuantity(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('totalQuantity', 'number', $order);
    }
}
