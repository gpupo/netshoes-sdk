<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\NetshoesSdk\Entity\Product\Product;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ProductTest extends TestCaseAbstract
{
    public static function setUpBeforeClass()
    {
        self::displayClassDocumentation(new Product());
    }

    protected function factory($data)
    {
        return $this->getFactory()->createProduct($data);
    }

    protected function assertIsObject($name)
    {
        $method = 'get' . $name;
        $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Product\\' . $name,
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
}
