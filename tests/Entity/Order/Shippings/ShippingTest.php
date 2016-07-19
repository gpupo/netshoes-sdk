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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Shippings;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Shipping;

class ShippingTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = Shipping::class;

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'shippingCode'       => 1,
            'customer'           => 'object',
            'freightAmount'      => 1.1,
            'invoice'            => 'object',
            'items'              => 'object',
            'sender'             => 'object',
            'status'             => 'active',
            'transport'          => 'object',
            'country'            => 'BR',
            'cancellationReason' => '',
            'devolutionItems'    => 'object',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getShippingCode()`` para acessar ShippingCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShippingCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shippingCode', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShippingCode()`` que define ShippingCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShippingCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shippingCode', 'integer', $object);
    }

    /**
     * @testdox Possui método ``getCustomer()`` para acessar Customer
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCustomer(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('customer', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCustomer()`` que define Customer
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCustomer(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('customer', 'object', $object);
    }

    /**
     * @testdox Possui método ``getFreightAmount()`` para acessar FreightAmount
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterFreightAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('freightAmount', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setFreightAmount()`` que define FreightAmount
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterFreightAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('freightAmount', 'number', $object);
    }

    /**
     * @testdox Possui método ``getInvoice()`` para acessar Invoice
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterInvoice(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('invoice', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setInvoice()`` que define Invoice
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterInvoice(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('invoice', 'object', $object);
    }

    /**
     * @testdox Possui método ``getItems()`` para acessar Items
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterItems(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('items', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setItems()`` que define Items
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterItems(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('items', 'object', $object);
    }

    /**
     * @testdox Possui método ``getSender()`` para acessar Sender
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterSender(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('sender', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setSender()`` que define Sender
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterSender(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('sender', 'object', $object);
    }

    /**
     * @testdox Possui método ``getStatus()`` para acessar Status
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('status', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setStatus()`` que define Status
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('status', 'string', $object);
    }

    /**
     * @testdox Possui método ``getTransport()`` para acessar Transport
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterTransport(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('transport', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTransport()`` que define Transport
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterTransport(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('transport', 'object', $object);
    }

    /**
     * @testdox Possui método ``getCountry()`` para acessar Country
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCountry(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('country', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCountry()`` que define Country
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCountry(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('country', 'string', $object);
    }

    /**
     * @testdox Possui método ``getCancellationReason()`` para acessar CancellationReason
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCancellationReason(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('cancellationReason', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCancellationReason()`` que define CancellationReason
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCancellationReason(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('cancellationReason', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDevolutionItems()`` para acessar DevolutionItems
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDevolutionItems(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('devolutionItems', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDevolutionItems()`` que define DevolutionItems
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDevolutionItems(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('devolutionItems', 'object', $object);
    }
}
