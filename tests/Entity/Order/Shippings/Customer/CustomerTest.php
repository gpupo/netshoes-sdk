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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Shippings\Customer;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class CustomerTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'address'          => 'object',
            'cellPhone'        => 'string',
            'customerName'     => 'string',
            'document'         => 'string',
            'landLine'         => 'string',
            'recipientName'    => 'string',
            'stateInscription' => 'string',
            'tradeName'        => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getAddress()`` para acessar Address
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('address', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAddress()`` que define Address
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('address', 'object', $object);
    }

    /**
     * @testdox Possui método ``getCellPhone()`` para acessar CellPhone
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterCellPhone(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('cellPhone', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCellPhone()`` que define CellPhone
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterCellPhone(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('cellPhone', 'string', $object);
    }

    /**
     * @testdox Possui método ``getCustomerName()`` para acessar CustomerName
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterCustomerName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('customerName', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCustomerName()`` que define CustomerName
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterCustomerName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('customerName', 'string', $object);
    }

    /**
     * @testdox Possui método ``getDocument()`` para acessar Document
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterDocument(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('document', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDocument()`` que define Document
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterDocument(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('document', 'string', $object);
    }

    /**
     * @testdox Possui método ``getLandLine()`` para acessar LandLine
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterLandLine(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('landLine', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setLandLine()`` que define LandLine
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterLandLine(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('landLine', 'string', $object);
    }

    /**
     * @testdox Possui método ``getRecipientName()`` para acessar RecipientName
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterRecipientName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('recipientName', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setRecipientName()`` que define RecipientName
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterRecipientName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('recipientName', 'string', $object);
    }

    /**
     * @testdox Possui método ``getStateInscription()`` para acessar StateInscription
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterStateInscription(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('stateInscription', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setStateInscription()`` que define StateInscription
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterStateInscription(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('stateInscription', 'string', $object);
    }

    /**
     * @testdox Possui método ``getTradeName()`` para acessar TradeName
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function getterTradeName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('tradeName', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setTradeName()`` que define TradeName
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer::getSchema
     * @test
     */
    public function setterTradeName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('tradeName', 'string', $object);
    }
}
