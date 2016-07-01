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

use Gpupo\NetshoesSdk\Entity\Order\Shippings\Sender;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Shippings\Sender
 *
 * @method int getSellerCode()    Acesso a sellerCode
 * @method setSellerCode(integer $sellerCode)    Define sellerCode
 * @method string getSellerName()    Acesso a sellerName
 * @method setSellerName(string $sellerName)    Define sellerName
 * @method string getSupplierCnpj()    Acesso a supplierCnpj
 * @method setSupplierCnpj(string $supplierCnpj)    Define supplierCnpj
 * @method string getSupplierName()    Acesso a supplierName
 * @method setSupplierName(string $supplierName)    Define supplierName
 */
class SenderTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Order\Shippings\Sender';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'sellerCode'   => 1,
            'sellerName'   => 'string',
            'supplierCnpj' => 'string',
            'supplierName' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getSellerCode()`` para acessar SellerCode
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getSellerCode(Sender $sender, $expected = null)
    {
        $this->assertSchemaGetter('sellerCode', 'integer', $sender, $expected);
    }

    /**
     * @testdox Possui método ``setSellerCode()`` que define SellerCode
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setSellerCode(Sender $sender, $expected = null)
    {
        $this->assertSchemaSetter('sellerCode', 'integer', $sender);
    }

    /**
     * @testdox Possui método ``getSellerName()`` para acessar SellerName
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getSellerName(Sender $sender, $expected = null)
    {
        $this->assertSchemaGetter('sellerName', 'string', $sender, $expected);
    }

    /**
     * @testdox Possui método ``setSellerName()`` que define SellerName
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setSellerName(Sender $sender, $expected = null)
    {
        $this->assertSchemaSetter('sellerName', 'string', $sender);
    }

    /**
     * @testdox Possui método ``getSupplierCnpj()`` para acessar SupplierCnpj
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getSupplierCnpj(Sender $sender, $expected = null)
    {
        $this->assertSchemaGetter('supplierCnpj', 'string', $sender, $expected);
    }

    /**
     * @testdox Possui método ``setSupplierCnpj()`` que define SupplierCnpj
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setSupplierCnpj(Sender $sender, $expected = null)
    {
        $this->assertSchemaSetter('supplierCnpj', 'string', $sender);
    }

    /**
     * @testdox Possui método ``getSupplierName()`` para acessar SupplierName
     * @dataProvider dataProviderObject
     * @cover ::get
     * @cover ::getSchema
     * @small
     * @test
     */
    public function getSupplierName(Sender $sender, $expected = null)
    {
        $this->assertSchemaGetter('supplierName', 'string', $sender, $expected);
    }

    /**
     * @testdox Possui método ``setSupplierName()`` que define SupplierName
     * @dataProvider dataProviderObject
     * @cover ::set
     * @cover ::getSchema
     * @small
     * @test
     */
    public function setSupplierName(Sender $sender, $expected = null)
    {
        $this->assertSchemaSetter('supplierName', 'string', $sender);
    }
}
