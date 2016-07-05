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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Shippings;

use Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice
 *
 * @method string getNumber()    Acesso a number
 * @method setNumber(string $number)    Define number
 * @method int getLine()    Acesso a line
 * @method setLine(integer $line)    Define line
 * @method string getAccessKey()    Acesso a accessKey
 * @method setAccessKey(string $accessKey)    Define accessKey
 * @method string getIssueDate()    Acesso a issueDate
 * @method setIssueDate(string $issueDate)    Define issueDate
 * @method string getShipDate()    Acesso a shipDate
 * @method setShipDate(string $shipDate)    Define shipDate
 * @method string getUrl()    Acesso a url
 * @method setUrl(string $url)    Define url
 */
class InvoiceTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'number'    => 4003,
            'line'      => 1,
            'accessKey' => '1789616901235555001000004003000004003',
            'issueDate' => '2016-05-10T09:44:54.000-03:00',
            'shipDate'  => 'string',
            'url'       => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     * @testdox Não é validado se número da nota fiscal ausente
     * @dataProvider dataProviderObject
     * @small
     * @test
     */
    public function numberFail(Invoice $invoice)
    {
        $invoice->setNumber('');
        $invoice->check();
        $invoice->toJson();
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     * @testdox Não é validado se linha da nota fiscal ausente
     * @dataProvider dataProviderObject
     * @small
     * @test
     */
    public function lineFail(Invoice $invoice)
    {
        $invoice->setLine('');
        $invoice->check();
        $invoice->toJson();
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     * @testdox Não é validado se data de emissão da nota fiscal ausente
     * @dataProvider dataProviderObject
     * @small
     * @test
     */
    public function issueDateFail(Invoice $invoice)
    {
        $invoice->setIssueDate('');
        $invoice->check();
        $invoice->toJson();
    }

    /**
     * @expectedException \Gpupo\CommonSdk\Exception\ExceptionInterface
     * @testdox Não é validado se chave da nota fiscal ausente
     * @dataProvider dataProviderObject
     * @small
     * @test
     */
    public function invoiceFail(Invoice $invoice)
    {
        $invoice->setAccessKey('');
        $invoice->check();
        $invoice->toJson();
    }

    /**
     * @testdox É valido se dados da nota fiscal presente
     * @dataProvider dataProviderObject
     * @small
     * @test
     */
    public function invoiceSuccess(Invoice $invoice)
    {
        $this->assertContains('accessKey', $invoice->toJson());
    }

    /**
     * @testdox Possui método ``getNumber()`` para acessar Number
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getNumber(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaGetter('number', 'string', $invoice, $expected);
    }

    /**
     * @testdox Possui método ``setNumber()`` que define Number
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setNumber(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaSetter('number', 'string', $invoice);
    }

    /**
     * @testdox Possui método ``getLine()`` para acessar Line
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getLine(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaGetter('line', 'integer', $invoice, $expected);
    }

    /**
     * @testdox Possui método ``setLine()`` que define Line
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setLine(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaSetter('line', 'integer', $invoice);
    }

    /**
     * @testdox Possui método ``getAccessKey()`` para acessar AccessKey
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getAccessKey(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaGetter('accessKey', 'string', $invoice, $expected);
    }

    /**
     * @testdox Possui método ``setAccessKey()`` que define AccessKey
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setAccessKey(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaSetter('accessKey', 'string', $invoice);
    }

    /**
     * @testdox Possui método ``getIssueDate()`` para acessar IssueDate
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getIssueDate(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaGetter('issueDate', 'string', $invoice, $expected);
    }

    /**
     * @testdox Possui método ``setIssueDate()`` que define IssueDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setIssueDate(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaSetter('issueDate', 'string', $invoice);
    }

    /**
     * @testdox Possui método ``getShipDate()`` para acessar ShipDate
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getShipDate(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaGetter('shipDate', 'string', $invoice, $expected);
    }

    /**
     * @testdox Possui método ``setShipDate()`` que define ShipDate
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setShipDate(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaSetter('shipDate', 'string', $invoice);
    }

    /**
     * @testdox Possui método ``getUrl()`` para acessar Url
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getUrl(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaGetter('url', 'string', $invoice, $expected);
    }

    /**
     * @testdox Possui método ``setUrl()`` que define Url
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setUrl(Invoice $invoice, $expected = null)
    {
        $this->assertSchemaSetter('url', 'string', $invoice);
    }
}
