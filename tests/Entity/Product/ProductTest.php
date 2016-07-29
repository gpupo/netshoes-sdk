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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute;
use Gpupo\NetshoesSdk\Entity\Product\Product;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Product
 */
class ProductTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = Product::class;

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'productId'   => 'string',
            'skus'        => 'object',
            'department'  => 'string',
            'productType' => 'string',
            'brand'       => 'string',
            'attributes'  => 'object',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    protected function factory($data)
    {
        return $this->getFactory()->createProduct($data);
    }

    protected function assertIsObject($name)
    {
        $method = 'get'.$name;
        $this->assertInstanceOf(
            'Gpupo\NetshoesSdk\Entity\Product\\'.$name,
            $this->factorySingleProduct()->$method()
        );
    }

    protected function factorySingleProduct()
    {
        $data = $this->dataProviderProducts();
        $current = current($data);

        return $this->factory($current);
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testPossuiPropriedadesEObjetos(Product $product)
    {
        $this->assertInstanceOf(Product::class, $product);
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testPossuiUmaColecaoAttributes(Product $product)
    {
        foreach ($product->getAttributes() as $attribute) {
            $this->assertInstanceOf(Attribute::class, $attribute);
        }
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testEntregaJson($data)
    {
        $product = $this->factory($data);
        $json = $product->toJson();
        $array = json_decode($json, true);

        foreach (['productId', 'department', 'productType', 'brand'] as $key) {
            $this->assertArrayHasKey($key, $array);
        }
    }

    /**
     * @dataProvider dataProviderProducts
     * @cover ::toPatch
     * @test
     */
    public function toPatch($data)
    {
        $product = $this->factory($data);
        $list = $product->toPatch(['department']);
        $this->assertSame(['productId', 'department'], array_keys($list));
    }

    /**
     * @testdox Possui método ``getProductId()`` para acessar ProductId
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterProductId(Product $product, $expected = null)
    {
        $this->assertSchemaGetter('productId', 'string', $product, $expected);
    }

    /**
     * @testdox Possui método ``setProductId()`` que define ProductId
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterProductId(Product $product, $expected = null)
    {
        $this->assertSchemaSetter('productId', 'string', $product);
    }

    /**
     * @testdox Possui método ``getSkus()`` para acessar Skus
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterSkus(Product $product, $expected = null)
    {
        $this->assertSchemaGetter('skus', 'object', $product, $expected);
    }

    /**
     * @testdox Possui método ``setSkus()`` que define Skus
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterSkus(Product $product, $expected = null)
    {
        $this->assertSchemaSetter('skus', 'object', $product);
    }

    /**
     * @testdox Possui método ``getDepartment()`` para acessar Department
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDepartment(Product $product, $expected = null)
    {
        $this->assertSchemaGetter('department', 'string', $product, $expected);
    }

    /**
     * @testdox Possui método ``setDepartment()`` que define Department
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDepartment(Product $product, $expected = null)
    {
        $this->assertSchemaSetter('department', 'string', $product);
    }

    /**
     * @testdox Possui método ``getProductType()`` para acessar ProductType
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterProductType(Product $product, $expected = null)
    {
        $this->assertSchemaGetter('productType', 'string', $product, $expected);
    }

    /**
     * @testdox Possui método ``setProductType()`` que define ProductType
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterProductType(Product $product, $expected = null)
    {
        $this->assertSchemaSetter('productType', 'string', $product);
    }

    /**
     * @testdox Possui método ``getBrand()`` para acessar Brand
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterBrand(Product $product, $expected = null)
    {
        $this->assertSchemaGetter('brand', 'string', $product, $expected);
    }

    /**
     * @testdox Possui método ``setBrand()`` que define Brand
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterBrand(Product $product, $expected = null)
    {
        $this->assertSchemaSetter('brand', 'string', $product);
    }

    /**
     * @testdox Possui método ``getAttributes()`` para acessar Attributes
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAttributes(Product $product, $expected = null)
    {
        $this->assertSchemaGetter('attributes', 'object', $product, $expected);
    }

    /**
     * @testdox Possui método ``setAttributes()`` que define Attributes
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAttributes(Product $product, $expected = null)
    {
        $this->assertSchemaSetter('attributes', 'object', $product);
    }
}
