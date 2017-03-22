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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Attributes;

use Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute
 */
class AttributeTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return \Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute
     */
    public function dataProviderAttribute()
    {
        $expected = [
            'name'  => 'string',
            'value' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getName()`` para acessar Name
     * @dataProvider dataProviderAttribute
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getterName(Attribute $attribute, $expected = null)
    {
        $this->assertSchemaGetter('name', 'string', $attribute, $expected);
    }

    /**
     * @testdox Possui método ``setName()`` que define Name
     * @dataProvider dataProviderAttribute
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setterName(Attribute $attribute, $expected = null)
    {
        $this->assertSchemaSetter('name', 'string', $attribute);
    }

    /**
     * @testdox Possui método ``getValue()`` para acessar Value
     * @dataProvider dataProviderAttribute
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getValue(Attribute $attribute, $expected = null)
    {
        $this->assertSchemaGetter('value', 'string', $attribute, $expected);
    }

    /**
     * @testdox Possui método ``setValue()`` que define Value
     * @dataProvider dataProviderAttribute
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setValue(Attribute $attribute, $expected = null)
    {
        $this->assertSchemaSetter('value', 'string', $attribute);
    }
}
