<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
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
            'code' => 'string',
            'name' => 'string',
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
