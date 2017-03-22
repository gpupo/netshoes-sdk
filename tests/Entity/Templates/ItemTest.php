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

namespace Gpupo\Tests\NetshoesSdk\Entity\Templates;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ItemTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Templates\Item';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'code'         => 'string',
            'name'         => 'string',
            'externalCode' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getCode()`` para acessar Code
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('code', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCode()`` que define Code
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('code', 'string', $object);
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
     * @testdox Possui método ``getExternalCode()`` para acessar ExternalCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterExternalCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('externalCode', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setExternalCode()`` que define ExternalCode
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterExternalCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('externalCode', 'string', $object);
    }
}
