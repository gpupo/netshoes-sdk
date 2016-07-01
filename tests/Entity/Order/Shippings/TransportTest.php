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
 *
 * @method string getCarrier()    Acesso a carrier
 * @method setCarrier(string $carrier)    Define carrier
 * @method string getDeliveryDate()    Acesso a deliveryDate
 * @method setDeliveryDate(string $deliveryDate)    Define deliveryDate
 * @method string getDeliveryService()    Acesso a deliveryService
 * @method setDeliveryService(string $deliveryService)    Define deliveryService
 * @method string getShipDate()    Acesso a shipDate
 * @method setShipDate(string $shipDate)    Define shipDate
 * @method string getTrackingLink()    Acesso a trackingLink
 * @method setTrackingLink(string $trackingLink)    Define trackingLink
 * @method string getTrackingNumber()    Acesso a trackingNumber
 * @method setTrackingNumber(string $trackingNumber)    Define trackingNumber
 * @method string getTrackingShipDate()    Acesso a trackingShipDate
 * @method setTrackingShipDate(string $trackingShipDate)    Define trackingShipDate
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

    public function dataProviderObject()
    {
        $expected = [
            'carrier'          => 'string',
            'deliveryDate'     => 'string',
            'deliveryService'  => 'string',
            'shipDate'         => 'string',
            'trackingLink'     => 'string',
            'trackingNumber'   => 'string',
            'trackingShipDate' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getCarrier()`` para acessar Carrier
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getDeliveryDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('deliveryDate', 'string', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setDeliveryDate()`` que define DeliveryDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setDeliveryDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('deliveryDate', 'string', $transport);
    }

    /**
     * @testdox Possui método ``getDeliveryService()`` para acessar DeliveryService
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('shipDate', 'string', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setShipDate()`` que define ShipDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('shipDate', 'string', $transport);
    }

    /**
     * @testdox Possui método ``getTrackingLink()`` para acessar TrackingLink
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
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
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getTrackingShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaGetter('trackingShipDate', 'string', $transport, $expected);
    }

    /**
     * @testdox Possui método ``setTrackingShipDate()`` que define TrackingShipDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setTrackingShipDate(Transport $transport, $expected = null)
    {
        $this->assertSchemaSetter('trackingShipDate', 'string', $transport);
    }
}
