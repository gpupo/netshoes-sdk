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

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

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
     * @testdox Possui método ``getAgreedDate()`` para acessar AgreedDate
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getAgreedDate
     * @test
     */
    public function getterAgreedDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('agreedDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAgreedDate()`` que define AgreedDate
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setAgreedDate
     * @test
     */
    public function setterAgreedDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('agreedDate', 'string', $object);
    }

    /**
     * @testdox Possui método ``getBusinessUnit()`` para acessar BusinessUnit
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getBusinessUnit
     * @test
     */
    public function getterBusinessUnit(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('businessUnit', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setBusinessUnit()`` que define BusinessUnit
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setBusinessUnit
     * @test
     */
    public function setterBusinessUnit(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('businessUnit', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDevolutionRequested()`` para acessar DevolutionRequested
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getDevolutionRequested
     * @test
     */
    public function getterDevolutionRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('devolutionRequested', 'boolean', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDevolutionRequested()`` que define DevolutionRequested
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setDevolutionRequested
     * @test
     */
    public function setterDevolutionRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('devolutionRequested', 'boolean', $object);
    }

    /**
     * @testdox Possui método ``getExchangeRequested()`` para acessar ExchangeRequested
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getExchangeRequested
     * @test
     */
    public function getterExchangeRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('exchangeRequested', 'boolean', $object, $expected);
    }

    /**
     * @testdox Possui método ``setExchangeRequested()`` que define ExchangeRequested
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setExchangeRequested
     * @test
     */
    public function setterExchangeRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('exchangeRequested', 'boolean', $object);
    }

    /**
     * @testdox Possui método ``getOrderDate()`` para acessar OrderDate
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getOrderDate
     * @test
     */
    public function getterOrderDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderDate()`` que define OrderDate
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setOrderDate
     * @test
     */
    public function setterOrderDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderDate', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOrderNumber()`` para acessar OrderNumber
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getOrderNumber
     * @test
     */
    public function getterOrderNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderNumber', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderNumber()`` que define OrderNumber
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setOrderNumber
     * @test
     */
    public function setterOrderNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderNumber', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOrderStatus()`` para acessar OrderStatus
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getOrderStatus
     * @test
     */
    public function getterOrderStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderStatus', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderStatus()`` que define OrderStatus
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setOrderStatus
     * @test
     */
    public function setterOrderStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderStatus', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOrderType()`` para acessar OrderType
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getOrderType
     * @test
     */
    public function getterOrderType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderType', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderType()`` que define OrderType
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setOrderType
     * @test
     */
    public function setterOrderType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderType', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOriginNumber()`` para acessar OriginNumber
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getOriginNumber
     * @test
     */
    public function getterOriginNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('originNumber', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOriginNumber()`` que define OriginNumber
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setOriginNumber
     * @test
     */
    public function setterOriginNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('originNumber', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOriginSite()`` para acessar OriginSite
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getOriginSite
     * @test
     */
    public function getterOriginSite(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('originSite', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOriginSite()`` que define OriginSite
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setOriginSite
     * @test
     */
    public function setterOriginSite(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('originSite', 'string', $object);
    }

    /**
     * @testdox Possui método ``getPaymentDate()`` para acessar PaymentDate
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getPaymentDate
     * @test
     */
    public function getterPaymentDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('paymentDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setPaymentDate()`` que define PaymentDate
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setPaymentDate
     * @test
     */
    public function setterPaymentDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('paymentDate', 'string', $object);
    }

    /**
     * @testdox Possui método ``getShippings()`` para acessar Shippings
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getShippings
     * @test
     */
    public function getterShippings(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shippings', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShippings()`` que define Shippings
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setShippings
     * @test
     */
    public function setterShippings(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shippings', 'object', $object);
    }

    /**
     * @testdox Possui método ``getTotalCommission()`` para acessar TotalCommission
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getTotalCommission
     * @test
     */
    public function getterTotalCommission(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalCommission', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalCommission()`` que define TotalCommission
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setTotalCommission
     * @test
     */
    public function setterTotalCommission(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalCommission', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalDiscount()`` para acessar TotalDiscount
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getTotalDiscount
     * @test
     */
    public function getterTotalDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalDiscount', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalDiscount()`` que define TotalDiscount
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setTotalDiscount
     * @test
     */
    public function setterTotalDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalDiscount', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalFreight()`` para acessar TotalFreight
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getTotalFreight
     * @test
     */
    public function getterTotalFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalFreight', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalFreight()`` que define TotalFreight
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setTotalFreight
     * @test
     */
    public function setterTotalFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalFreight', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalGross()`` para acessar TotalGross
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getTotalGross
     * @test
     */
    public function getterTotalGross(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalGross', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalGross()`` que define TotalGross
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setTotalGross
     * @test
     */
    public function setterTotalGross(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalGross', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalNet()`` para acessar TotalNet
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getTotalNet
     * @test
     */
    public function getterTotalNet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalNet', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalNet()`` que define TotalNet
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setTotalNet
     * @test
     */
    public function setterTotalNet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalNet', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalQuantity()`` para acessar TotalQuantity
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::getTotalQuantity
     * @test
     */
    public function getterTotalQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalQuantity', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalQuantity()`` que define TotalQuantity
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Order::setTotalQuantity
     * @test
     */
    public function setterTotalQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalQuantity', 'number', $object);
    }
}
