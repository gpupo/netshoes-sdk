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
     * @test
     */
    public function getterAgreedDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('agreedDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAgreedDate()`` que define AgreedDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAgreedDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('agreedDate', 'string', $object);
    }

    /**
     * @testdox Possui método ``getBusinessUnit()`` para acessar BusinessUnit
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterBusinessUnit(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('businessUnit', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setBusinessUnit()`` que define BusinessUnit
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterBusinessUnit(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('businessUnit', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDevolutionRequested()`` para acessar DevolutionRequested
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDevolutionRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('devolutionRequested', 'boolean', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDevolutionRequested()`` que define DevolutionRequested
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDevolutionRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('devolutionRequested', 'boolean', $object);
    }

    /**
     * @testdox Possui método ``getExchangeRequested()`` para acessar ExchangeRequested
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterExchangeRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('exchangeRequested', 'boolean', $object, $expected);
    }

    /**
     * @testdox Possui método ``setExchangeRequested()`` que define ExchangeRequested
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterExchangeRequested(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('exchangeRequested', 'boolean', $object);
    }

    /**
     * @testdox Possui método ``getOrderDate()`` para acessar OrderDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterOrderDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderDate()`` que define OrderDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterOrderDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderDate', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOrderNumber()`` para acessar OrderNumber
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterOrderNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderNumber', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderNumber()`` que define OrderNumber
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterOrderNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderNumber', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOrderStatus()`` para acessar OrderStatus
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterOrderStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderStatus', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderStatus()`` que define OrderStatus
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterOrderStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderStatus', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOrderType()`` para acessar OrderType
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterOrderType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('orderType', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrderType()`` que define OrderType
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterOrderType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('orderType', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOriginNumber()`` para acessar OriginNumber
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterOriginNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('originNumber', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOriginNumber()`` que define OriginNumber
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterOriginNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('originNumber', 'string', $object);
    }

    /**
     * @testdox Possui método ``getOriginSite()`` para acessar OriginSite
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterOriginSite(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('originSite', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOriginSite()`` que define OriginSite
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterOriginSite(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('originSite', 'string', $object);
    }

    /**
     * @testdox Possui método ``getPaymentDate()`` para acessar PaymentDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterPaymentDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('paymentDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setPaymentDate()`` que define PaymentDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterPaymentDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('paymentDate', 'string', $object);
    }

    /**
     * @testdox Possui método ``getShippings()`` para acessar Shippings
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShippings(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shippings', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShippings()`` que define Shippings
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShippings(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shippings', 'object', $object);
    }

    /**
     * @testdox Possui método ``getTotalCommission()`` para acessar TotalCommission
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTotalCommission(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalCommission', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalCommission()`` que define TotalCommission
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTotalCommission(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalCommission', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalDiscount()`` para acessar TotalDiscount
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTotalDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalDiscount', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalDiscount()`` que define TotalDiscount
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTotalDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalDiscount', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalFreight()`` para acessar TotalFreight
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTotalFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalFreight', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalFreight()`` que define TotalFreight
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTotalFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalFreight', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalGross()`` para acessar TotalGross
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTotalGross(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalGross', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalGross()`` que define TotalGross
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTotalGross(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalGross', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalNet()`` para acessar TotalNet
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTotalNet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalNet', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalNet()`` que define TotalNet
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTotalNet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalNet', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalQuantity()`` para acessar TotalQuantity
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTotalQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalQuantity', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalQuantity()`` que define TotalQuantity
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTotalQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalQuantity', 'number', $object);
    }
}
