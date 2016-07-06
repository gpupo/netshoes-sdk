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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Sku;

use Gpupo\NetshoesSdk\Entity\Product\Sku\Item;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Sku\Item
 */
class ItemTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Product\Sku\Item';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    protected $array = [
            'sku'         => '12345',
            'name'        => 'string',
            'description' => 'string',
            'color'       => 'string',
            'size'        => 'string',
            'gender'      => 'string',
            'eanIsbn'     => 'string',
            'video'       => 'string',
            'height'      => 'string',
            'width'       => 'string',
            'depth'       => 'string',
            'weight'      => 'string',
            'listPrice'   => 1.22,
            'sellPrice'   => 0.99,
            'stock'       => 20,
            'status'      => true,
        ];

    public function dataProviderObject()
    {
        $o = $this->dataProviderEntitySchema(self::QUALIFIED, $this->array);

        $o[0][0] = new Item($o[0][0]);

        return $o;
    }

    /**
     * @testdox Prepara o Json para gravação de preço
     * @covers ::beforeConstruct
     * @covers ::toPrice
     * @test
     */
    public function toPrice()
    {
        $item = $this->proxy(new Item($this->array));
        $this->assertSame(['price' => 1.22], $item->toPrice());
    }

    /**
     * @testdox Prepara o Json para gravação de preço promocional
     * @covers ::beforeConstruct
     * @covers ::toPriceSchedule
     * @test
     */
    public function toPriceSchedule()
    {
        $item = $this->proxy(new Item($this->array));
        $this->assertSame([
            'priceTo' => 0.99,
            'dateInit' => '2016-01-01T00:00:01.000Z',
            'dateEnd' => '2018-01-01T00:00:01.000Z',
        ], $item->toPriceSchedule());
    }

    /**
     * @testdox Prepara o Json para gravação de Estoque
     * @covers ::beforeConstruct
     * @covers ::toStock
     * @test
     */
    public function toStock()
    {
        $item = $this->proxy(new Item($this->array));
        $this->assertSame(['available' => 20], $item->toStock());
    }

    /**
     * @testdox Prepara o Json para gravação de Situação (disponibilidade)
     * @covers ::beforeConstruct
     * @covers ::toStatus
     * @test
     */
    public function toStatus()
    {
        $item = $this->proxy(new Item($this->array));
        $this->assertSame(['active' => true], $item->toStatus());
    }

    /**
     * @testdox Possui método ``getId()`` para acessar Sku Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterId(Item $object, $expected = null)
    {
        $this->assertSame('12345', $object->getId());
        $this->assertSchemaGetter('sku', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``getSku()`` para acessar Sku
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterSku(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('sku', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setSku()`` que define Sku
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterSku(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('sku', 'string', $object);
    }

    /**
     * @testdox Possui método ``getName()`` para acessar Name
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterName(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('name', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setName()`` que define Name
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterName(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('name', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDescription()`` para acessar Description
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDescription(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('description', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDescription()`` que define Description
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDescription(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('description', 'string', $object);
    }

    /**
     * @testdox Possui método ``getColor()`` para acessar Color
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterColor(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('color', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setColor()`` que define Color
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterColor(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('color', 'string', $object);
    }

    /**
     * @testdox Possui método ``getSize()`` para acessar Size
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterSize(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('size', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setSize()`` que define Size
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterSize(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('size', 'string', $object);
    }

    /**
     * @testdox Possui método ``getGender()`` para acessar Gender
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterGender(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('gender', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setGender()`` que define Gender
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterGender(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('gender', 'string', $object);
    }

    /**
     * @testdox Possui método ``getEanIsbn()`` para acessar EanIsbn
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterEanIsbn(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('eanIsbn', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setEanIsbn()`` que define EanIsbn
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterEanIsbn(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('eanIsbn', 'string', $object);
    }

    /**
     * @testdox Possui método ``getVideo()`` para acessar Video
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterVideo(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('video', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setVideo()`` que define Video
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterVideo(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('video', 'string', $object);
    }

    /**
     * @testdox Possui método ``getHeight()`` para acessar Height
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterHeight(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('height', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setHeight()`` que define Height
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterHeight(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('height', 'string', $object);
    }

    /**
     * @testdox Possui método ``getWidth()`` para acessar Width
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterWidth(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('width', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setWidth()`` que define Width
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterWidth(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('width', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDepth()`` para acessar Depth
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDepth(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('depth', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDepth()`` que define Depth
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDepth(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('depth', 'string', $object);
    }

    /**
     * @testdox Possui método ``getWeight()`` para acessar Weight
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterWeight(Item $object, $expected = null)
    {
        $this->assertSchemaGetter('weight', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setWeight()`` que define Weight
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterWeight(Item $object, $expected = null)
    {
        $this->assertSchemaSetter('weight', 'string', $object);
    }
}
