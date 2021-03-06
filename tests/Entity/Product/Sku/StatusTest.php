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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class StatusTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Product\Sku\Status';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'active' => true,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getActive()`` para acessar Active
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterActive(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('active', 'boolean', $object, $expected);
    }

    /**
     * @testdox Possui método ``setActive()`` que define Active
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterActive(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('active', 'boolean', $object);
    }
}
