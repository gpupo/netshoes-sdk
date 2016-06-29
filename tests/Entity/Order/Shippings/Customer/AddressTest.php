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

class AddressTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'city'         => 'string',
            'complement'   => 'string',
            'neighborhood' => 'string',
            'number'       => 'string',
            'postalCode'   => 'string',
            'reference'    => 'string',
            'state'        => 'string',
            'street'       => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getCity()`` para acessar City
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterCity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('city', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCity()`` que define City
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterCity(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('city', 'string', $object);
    }

    /**
     * @testdox Possui método ``getComplement()`` para acessar Complement
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterComplement(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('complement', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setComplement()`` que define Complement
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterComplement(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('complement', 'string', $object);
    }

    /**
     * @testdox Possui método ``getNeighborhood()`` para acessar Neighborhood
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterNeighborhood(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('neighborhood', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setNeighborhood()`` que define Neighborhood
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterNeighborhood(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('neighborhood', 'string', $object);
    }

    /**
     * @testdox Possui método ``getNumber()`` para acessar Number
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('number', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setNumber()`` que define Number
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterNumber(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('number', 'string', $object);
    }

    /**
     * @testdox Possui método ``getPostalCode()`` para acessar PostalCode
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterPostalCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('postalCode', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setPostalCode()`` que define PostalCode
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterPostalCode(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('postalCode', 'string', $object);
    }

    /**
     * @testdox Possui método ``getReference()`` para acessar Reference
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterReference(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('reference', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setReference()`` que define Reference
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterReference(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('reference', 'string', $object);
    }

    /**
     * @testdox Possui método ``getState()`` para acessar State
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterState(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('state', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setState()`` que define State
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterState(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('state', 'string', $object);
    }

    /**
     * @testdox Possui método ``getStreet()`` para acessar Street
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::get
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function getterStreet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('street', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setStreet()`` que define Street
     * @dataProvider dataProviderObject
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::set
     * @cover \Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address::getSchema
     * @test
     */
    public function setterStreet(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('street', 'string', $object);
    }
}
