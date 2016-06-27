<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ItemTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Product\Sku\Item';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }
    public function dataProviderObject()
    {
        $expected = [
                'sku'         => 'string',
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
            ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

        /**
         * @testdox Possui método ``getSku()`` para acessar Sku
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterSku(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('sku', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setSku()`` que define Sku
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterSku(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('sku', 'string', $object);
        }

        /**
         * @testdox Possui método ``getName()`` para acessar Name
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterName(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('name', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setName()`` que define Name
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterName(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('name', 'string', $object);
        }

        /**
         * @testdox Possui método ``getDescription()`` para acessar Description
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterDescription(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('description', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setDescription()`` que define Description
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterDescription(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('description', 'string', $object);
        }

        /**
         * @testdox Possui método ``getColor()`` para acessar Color
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterColor(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('color', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setColor()`` que define Color
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterColor(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('color', 'string', $object);
        }

        /**
         * @testdox Possui método ``getSize()`` para acessar Size
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterSize(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('size', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setSize()`` que define Size
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterSize(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('size', 'string', $object);
        }

        /**
         * @testdox Possui método ``getGender()`` para acessar Gender
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterGender(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('gender', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setGender()`` que define Gender
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterGender(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('gender', 'string', $object);
        }

        /**
         * @testdox Possui método ``getEanIsbn()`` para acessar EanIsbn
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterEanIsbn(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('eanIsbn', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setEanIsbn()`` que define EanIsbn
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterEanIsbn(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('eanIsbn', 'string', $object);
        }

        /**
         * @testdox Possui método ``getVideo()`` para acessar Video
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterVideo(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('video', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setVideo()`` que define Video
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterVideo(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('video', 'string', $object);
        }

        /**
         * @testdox Possui método ``getHeight()`` para acessar Height
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterHeight(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('height', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setHeight()`` que define Height
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterHeight(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('height', 'string', $object);
        }

        /**
         * @testdox Possui método ``getWidth()`` para acessar Width
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterWidth(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('width', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setWidth()`` que define Width
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterWidth(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('width', 'string', $object);
        }

        /**
         * @testdox Possui método ``getDepth()`` para acessar Depth
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterDepth(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('depth', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setDepth()`` que define Depth
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterDepth(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('depth', 'string', $object);
        }

        /**
         * @testdox Possui método ``getWeight()`` para acessar Weight
         * @dataProvider dataProviderObject
         * @test
         */
        public function getterWeight(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaGetter('weight', 'string', $object, $expected);
        }

        /**
         * @testdox Possui método ``setWeight()`` que define Weight
         * @dataProvider dataProviderObject
         * @test
         */
        public function setterWeight(EntityInterface $object, $expected = null)
        {
            $this->assertSchemaSetter('weight', 'string', $object);
        }
}
