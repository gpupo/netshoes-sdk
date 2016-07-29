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

use Gpupo\NetshoesSdk\Entity\Order\Shippings\Transport;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Shippings\Transport
 */
class TransportTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Order\Shippings\Transport';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return \Gpupo\NetshoesSdk\Entity\Order\Shippings\Transport
     */
    public function dataProviderTransport()
    {
        $expected = [
            'carrier'               => 'string',
            'deliveryDate'          => 'string',
            'estimatedDeliveryDate' => 'string',
            'deliveryService'       => 'string',
            'shipDate'              => 'string',
            'trackingLink'          => 'string',
            'trackingNumber'        => 'string',
            'trackingShipDate'      => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     * @testdox Não é validado se data de entrega ausente
     * @dataProvider dataProviderTransport
     * @small
     * @test
     */
    public function deliveryDateFail(Transport $invoice)
    {
        $invoice->setDeliveryDate('');
        $invoice->check();
        $invoice->toJson();
    }

    /**
     * @testdox Possui método ``getCarrier()`` para acessar Carrier
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getCarrier(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('carrier', 'string', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setCarrier()`` que define Carrier
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setCarrier(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('carrier', 'string', $transport);
    }

    /**
     * @testdox Possui método ``getDeliveryDate()`` para acessar DeliveryDate
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getDeliveryDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('deliveryDate', 'datetime', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setDeliveryDate()`` que define DeliveryDate
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setDeliveryDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('deliveryDate', 'datetime', $transport);
    }

    /**
     * @testdox Possui método ``getEstimatedDeliveryDate()`` para acessar EstimatedDeliveryDate
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getEstimatedDeliveryDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('estimatedDeliveryDate', 'datetime', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setEstimatedDeliveryDate()`` que define EstimatedDeliveryDate
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setEstimatedDeliveryDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('estimatedDeliveryDate', 'datetime', $transport);
    }

    /**
     * @testdox Possui método ``getDeliveryService()`` para acessar DeliveryService
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getDeliveryService(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('deliveryService', 'string', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setDeliveryService()`` que define DeliveryService
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setDeliveryService(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('deliveryService', 'string', $transport);
    }

    /**
     * @testdox Possui método ``getShipDate()`` para acessar ShipDate
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('shipDate', 'datetime', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setShipDate()`` que define ShipDate
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('shipDate', 'datetime', $transport);
    }

    /**
     * @testdox Possui método ``getTrackingLink()`` para acessar TrackingLink
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getTrackingLink(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('trackingLink', 'string', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setTrackingLink()`` que define TrackingLink
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setTrackingLink(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('trackingLink', 'string', $transport);
    }

    /**
     * @testdox Possui método ``getTrackingNumber()`` para acessar TrackingNumber
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getTrackingNumber(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('trackingNumber', 'string', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setTrackingNumber()`` que define TrackingNumber
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setTrackingNumber(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('trackingNumber', 'string', $transport);
    }

    /**
     * @testdox Possui método ``getTrackingShipDate()`` para acessar TrackingShipDate
     * @dataProvider dataProviderTransport
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getTrackingShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('trackingShipDate', 'datetime', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setTrackingShipDate()`` que define TrackingShipDate
     * @dataProvider dataProviderTransport
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setTrackingShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('trackingShipDate', 'datetime', $transport);
    }
}
