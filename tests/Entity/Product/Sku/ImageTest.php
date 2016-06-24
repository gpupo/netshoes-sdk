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

class ImageTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Product\Sku\Image';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {

        $expected = [
            'url' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }
    
    /**
     * @testdox Possui método ``getUrl()`` para acessar Url
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterUrl(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('url', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setUrl()`` que define Url
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterUrl(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('url', 'string', $object);
    }
}
