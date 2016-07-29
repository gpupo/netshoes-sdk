<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Sku;

use Gpupo\NetshoesSdk\Entity\Product\Sku\PriceSchedule;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Sku\PriceSchedule
 */
class PriceScheduleTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = PriceSchedule::class;

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return \Gpupo\NetshoesSdk\Entity\Product\Sku\PriceSchedule
     */
    public function dataProviderPriceSchedule()
    {
        $expected = [
            'priceFrom' => 100.10,
            'priceTo'   => 80.80,
            'dateInit'  => '2016-06-24T15:01:38.826Z',
            'dateEnd'   => '2016-06-24T15:01:38.826Z',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    protected $dateFormatList = [
        '2016-06-24 00:00:00',
        '2016/06/24 00:00:00',
        '24-06-2016',
        '2016/06/24',
    ];
    /**
     * @testdox Formata entradas de data em ``ISO 8601 date format``
     * @dataProvider dataProviderPriceSchedule
     * @cover ::set
     * @cover ::dateFormat
     * @small
     * @test
     */
    public function dateFormat(PriceSchedule $rawPriceSchedule, $expected = null)
    {
        $priceSchedule = $this->proxy($rawPriceSchedule);

        foreach ($this->dateFormatList as $string) {
            $this->assertSame('2016-06-24T00:00:00-03:00', $priceSchedule->dateFormat($string));
        }
    }

    /**
     * @testdox Possui método ``setDateInit()`` que define DateInit
     * @dataProvider dataProviderPriceSchedule
     * @cover ::set
     * @cover ::getSchema
     * @cover ::dateFormat
     * @small
     * @test
     */
    public function setDateInit(PriceSchedule $priceSchedule, $expected = null)
    {
        foreach ($this->dateFormatList as $string) {
            $priceSchedule->setDateInit($string);
            $this->assertSame('2016-06-24T00:00:00-03:00', $priceSchedule->getDateInit());
        }
    }

    /**
     * @testdox Possui método ``setDateEnd()`` que define DateEnd
     * @dataProvider dataProviderPriceSchedule
     * @cover ::set
     * @cover ::getSchema
     * @cover ::dateFormat
     * @small
     * @test
     */
    public function setDateEnd(PriceSchedule $priceSchedule, $expected = null)
    {
        foreach ($this->dateFormatList as $string) {
            $priceSchedule->setDateEnd($string);
            $this->assertSame('2016-06-24T00:00:00-03:00', $priceSchedule->getDateEnd());
        }
    }

    /**
     * @testdox A data de início de uma promoção é o momento atual quando não informado
     * @cover ::toArray
     * @small
     * @test
     */
    public function defaultDateInit()
    {
        $priceSchedule = new PriceSchedule();
        $date = $priceSchedule->toArray()['dateInit'];
        $this->assertStringStartsWith(date('Y-m-d'), $date);
    }

    /**
     * @testdox A data de término de uma promoção é após 1 mês no futuro quando não informado
     * @cover ::toArray
     * @small
     * @test
     */
    public function defaultDateEnd()
    {
        $priceSchedule = new PriceSchedule();
        $date = $priceSchedule->toArray()['dateEnd'];
        $this->assertStringStartsWith(date('Y-m-d', strtotime('+1 month', strtotime('NOW'))), $date);
    }

    /**
     * @testdox Possui método ``getPriceFrom()`` para acessar PriceFrom
     * @dataProvider dataProviderPriceSchedule
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getPriceFrom(PriceSchedule $priceSchedule, $expected = null)
    {
        $this->assertSchemaGetter('priceFrom', 'number', $priceSchedule, $expected);
    }

    /**
     * @testdox Possui método ``setPriceFrom()`` que define PriceFrom
     * @dataProvider dataProviderPriceSchedule
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setPriceFrom(PriceSchedule $priceSchedule, $expected = null)
    {
        $this->assertSchemaSetter('priceFrom', 'number', $priceSchedule);
    }

    /**
     * @testdox Possui método ``getPriceTo()`` para acessar PriceTo
     * @dataProvider dataProviderPriceSchedule
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getPriceTo(PriceSchedule $priceSchedule, $expected = null)
    {
        $this->assertSchemaGetter('priceTo', 'number', $priceSchedule, $expected);
    }

    /**
     * @testdox Possui método ``setPriceTo()`` que define PriceTo
     * @dataProvider dataProviderPriceSchedule
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setPriceTo(PriceSchedule $priceSchedule, $expected = null)
    {
        $this->assertSchemaSetter('priceTo', 'number', $priceSchedule);
    }

    /**
     * @testdox Possui método ``getDateInit()`` para acessar DateInit
     * @dataProvider dataProviderPriceSchedule
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getDateInit(PriceSchedule $priceSchedule, $expected = null)
    {
        $this->assertSchemaGetter('dateInit', 'string', $priceSchedule, $expected);
    }

    /**
     * @testdox Possui método ``getDateEnd()`` para acessar DateEnd
     * @dataProvider dataProviderPriceSchedule
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getDateEnd(PriceSchedule $priceSchedule, $expected = null)
    {
        $this->assertSchemaGetter('dateEnd', 'string', $priceSchedule, $expected);
    }
}
