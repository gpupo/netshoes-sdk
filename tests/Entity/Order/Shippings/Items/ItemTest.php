<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://www.gpupo.com/>.
 */

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Shippings\Items;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Item
 */
class ItemTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Item';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'brand'                    => 'string',
            'color'                    => 'string',
            'departmentCode'           => 1,
            'departmentName'           => 'string',
            'discountUnitValue'        => 2.1,
            'ean'                      => 'string',
            'flavor'                   => 'string',
            'grossUnitValue'           => 43.21,
            'itemId'                   => 993882,
            'manufacturerCode'         => 'string',
            'name'                     => 'string',
            'netUnitValue'             => 872.1,
            'quantity'                 => 0.22,
            'size'                     => 'string',
            'sku'                      => 'string',
            'status'                   => 'string',
            'totalCommission'          => 772.11,
            'totalDiscount'            => 876.11,
            'totalFreight'             => 11.1,
            'totalGross'               => 11.0,
            'totalNet'                 => 0.11,
            'checkInData'              => 'string',
            'devolutionData'           => 'string',
            'devolutionExchangeStatus' => 'string',
            'exchangeProcessCode'      => 11111,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getBrand()`` para acessar Brand
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterBrand(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('brand', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setBrand()`` que define Brand
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterBrand(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('brand', 'string', $object);
    }

    /**
     * @testdox Possui método ``getColor()`` para acessar Color
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterColor(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('color', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setColor()`` que define Color
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterColor(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('color', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDepartmentCode()`` para acessar DepartmentCode
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterDepartmentCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('departmentCode', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDepartmentCode()`` que define DepartmentCode
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterDepartmentCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('departmentCode', 'integer', $object);
    }

    /**
     * @testdox Possui método ``getDepartmentName()`` para acessar DepartmentName
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterDepartmentName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('departmentName', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDepartmentName()`` que define DepartmentName
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterDepartmentName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('departmentName', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDiscountUnitValue()`` para acessar DiscountUnitValue
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterDiscountUnitValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('discountUnitValue', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDiscountUnitValue()`` que define DiscountUnitValue
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterDiscountUnitValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('discountUnitValue', 'number', $object);
    }

    /**
     * @testdox Possui método ``getEan()`` para acessar Ean
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterEan(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('ean', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setEan()`` que define Ean
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterEan(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('ean', 'string', $object);
    }

    /**
     * @testdox Possui método ``getFlavor()`` para acessar Flavor
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterFlavor(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('flavor', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setFlavor()`` que define Flavor
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterFlavor(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('flavor', 'string', $object);
    }

    /**
     * @testdox Possui método ``getGrossUnitValue()`` para acessar GrossUnitValue
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterGrossUnitValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('grossUnitValue', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setGrossUnitValue()`` que define GrossUnitValue
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterGrossUnitValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('grossUnitValue', 'number', $object);
    }

    /**
     * @testdox Possui método ``getItemId()`` para acessar ItemId
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterItemId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('itemId', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setItemId()`` que define ItemId
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterItemId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('itemId', 'integer', $object);
    }

    /**
     * @testdox Possui método ``getManufacturerCode()`` para acessar ManufacturerCode
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterManufacturerCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('manufacturerCode', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setManufacturerCode()`` que define ManufacturerCode
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterManufacturerCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('manufacturerCode', 'string', $object);
    }

    /**
     * @testdox Possui método ``getName()`` para acessar Name
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('name', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setName()`` que define Name
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('name', 'string', $object);
    }

    /**
     * @testdox Possui método ``getNetUnitValue()`` para acessar NetUnitValue
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterNetUnitValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('netUnitValue', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setNetUnitValue()`` que define NetUnitValue
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterNetUnitValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('netUnitValue', 'number', $object);
    }

    /**
     * @testdox Possui método ``getQuantity()`` para acessar Quantity
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('quantity', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setQuantity()`` que define Quantity
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterQuantity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('quantity', 'number', $object);
    }

    /**
     * @testdox Possui método ``getSize()`` para acessar Size
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterSize(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('size', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setSize()`` que define Size
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterSize(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('size', 'string', $object);
    }

    /**
     * @testdox Possui método ``getSku()`` para acessar Sku
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterSku(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('sku', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setSku()`` que define Sku
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterSku(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('sku', 'string', $object);
    }

    /**
     * @testdox Possui método ``getStatus()`` para acessar Status
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('status', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setStatus()`` que define Status
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('status', 'string', $object);
    }

    /**
     * @testdox Possui método ``getTotalCommission()`` para acessar TotalCommission
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterTotalCommission(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalCommission', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalCommission()`` que define TotalCommission
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterTotalCommission(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalCommission', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalDiscount()`` para acessar TotalDiscount
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterTotalDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalDiscount', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalDiscount()`` que define TotalDiscount
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterTotalDiscount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalDiscount', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalFreight()`` para acessar TotalFreight
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterTotalFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalFreight', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalFreight()`` que define TotalFreight
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterTotalFreight(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalFreight', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalGross()`` para acessar TotalGross
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterTotalGross(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalGross', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalGross()`` que define TotalGross
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterTotalGross(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalGross', 'number', $object);
    }

    /**
     * @testdox Possui método ``getTotalNet()`` para acessar TotalNet
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterTotalNet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('totalNet', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTotalNet()`` que define TotalNet
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterTotalNet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('totalNet', 'number', $object);
    }

    /**
     * @testdox Possui método ``getCheckInData()`` para acessar CheckInData
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterCheckInData(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('checkInData', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCheckInData()`` que define CheckInData
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterCheckInData(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('checkInData', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDevolutionData()`` para acessar DevolutionData
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterDevolutionData(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('devolutionData', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDevolutionData()`` que define DevolutionData
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterDevolutionData(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('devolutionData', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDevolutionExchangeStatus()`` para acessar DevolutionExchangeStatus
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterDevolutionExchangeStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('devolutionExchangeStatus', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDevolutionExchangeStatus()`` que define DevolutionExchangeStatus
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterDevolutionExchangeStatus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('devolutionExchangeStatus', 'string', $object);
    }

    /**
     * @testdox Possui método ``getExchangeProcessCode()`` para acessar ExchangeProcessCode
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @test
     */
    public function getterExchangeProcessCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('exchangeProcessCode', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setExchangeProcessCode()`` que define ExchangeProcessCode
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @test
     */
    public function setterExchangeProcessCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('exchangeProcessCode', 'integer', $object);
    }
}
