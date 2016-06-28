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

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\NetshoesSdk\Entity\Product\Product;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ProductTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Product\Product';

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
        $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Product\\'.$name,
            $this->factorySingleProduct()->$method());
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
        $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Product\Product', $product);
    }

    /**
     * @dataProvider dataProviderProducts
     */
    public function testPossuiUmaColecaoAttributes(Product $product)
    {
        foreach ($product->getAttributes() as $attribute) {
            $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute', $attribute);
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
     * @testdox Possui método ``getProductId()`` para acessar ProductId
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterProductId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('productId', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setProductId()`` que define ProductId
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterProductId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('productId', 'string', $object);
    }

    /**
     * @testdox Possui método ``getSkus()`` para acessar Skus
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterSkus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('skus', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setSkus()`` que define Skus
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterSkus(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('skus', 'object', $object);
    }

    /**
     * @testdox Possui método ``getDepartment()`` para acessar Department
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDepartment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('department', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDepartment()`` que define Department
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDepartment(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('department', 'string', $object);
    }

    /**
     * @testdox Possui método ``getProductType()`` para acessar ProductType
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterProductType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('productType', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setProductType()`` que define ProductType
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterProductType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('productType', 'string', $object);
    }

    /**
     * @testdox Possui método ``getBrand()`` para acessar Brand
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterBrand(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('brand', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setBrand()`` que define Brand
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterBrand(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('brand', 'string', $object);
    }

    /**
     * @testdox Possui método ``getAttributes()`` para acessar Attributes
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAttributes(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('attributes', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAttributes()`` que define Attributes
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAttributes(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('attributes', 'object', $object);
    }
}
