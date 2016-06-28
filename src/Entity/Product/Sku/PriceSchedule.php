<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method float getPriceFrom()    Acesso a priceFrom
 * @method setPriceFrom(float $priceFrom)    Define priceFrom
 * @method float getPriceTo()    Acesso a priceTo
 * @method setPriceTo(float $priceTo)    Define priceTo
 * @method string getDateInit()    Acesso a dateInit
 * @method setDateInit(string $dateInit)    Define dateInit
 * @method string getDateEnd()    Acesso a dateEnd
 * @method setDateEnd(string $dateEnd)    Define dateEnd
 */
class PriceSchedule extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return  [
            'priceFrom' => 99.99,
            'priceTo'   => 88.89,
            'dateInit'  => '2016-06-24T15:01:38.826Z',
            'dateEnd'   => '2016-06-24T15:01:38.826Z',
        ];
    }

    protected function setUp()
    {
        $this->setOptionalSchema(['priceFrom', 'dateInit', 'dateEnd']);
    }

    /**
     * @testdox Possui método ``getPriceFrom()`` para acessar PriceFrom
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterPriceFrom(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('priceFrom', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setPriceFrom()`` que define PriceFrom
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterPriceFrom(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('priceFrom', 'number', $object);
    }

    /**
     * @testdox Possui método ``getPriceTo()`` para acessar PriceTo
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterPriceTo(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('priceTo', 'number', $object, $expected);
    }

    /**
     * @testdox Possui método ``setPriceTo()`` que define PriceTo
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterPriceTo(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('priceTo', 'number', $object);
    }

    /**
     * @testdox Possui método ``getDateInit()`` para acessar DateInit
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDateInit(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('dateInit', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDateInit()`` que define DateInit
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDateInit(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('dateInit', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDateEnd()`` para acessar DateEnd
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDateEnd(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('dateEnd', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDateEnd()`` que define DateEnd
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDateEnd(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('dateEnd', 'string', $object);
    }
}
