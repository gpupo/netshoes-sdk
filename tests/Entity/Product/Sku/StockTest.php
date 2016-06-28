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

class StockTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Product\Sku\Stock';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'available' => 50,
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getAvailable()`` para acessar Available
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAvailable(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('available', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAvailable()`` que define Available
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAvailable(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('available', 'number', $object);
    }
}
