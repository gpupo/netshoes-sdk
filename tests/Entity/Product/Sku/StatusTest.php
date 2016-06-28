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
