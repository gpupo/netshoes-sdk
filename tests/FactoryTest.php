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

namespace Gpupo\Tests\NetshoesSdk;

use Gpupo\NetshoesSdk\Factory;
use Gpupo\Tests\CommonSdk\FactoryTestAbstract;

class FactoryTest extends FactoryTestAbstract
{
    public $namespace = '\Gpupo\NetshoesSdk\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

    /**
     * @test Dá acesso a ``Factory``
     * @test
     */
    public function setClient()
    {
        $factory = new Factory();

        $factory->setClient([
            'client_id'    => 'x882ja',
            'access_token' => '8998329jejd',
        ]);

        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Client\Client', $factory->getClient());
    }

    /**
     * @dataProvider dataProviderManager
     */
    public function testCentralizaAcessoAManagers($objectExpected, $target)
    {
        return $this->assertInstanceOf($objectExpected,
            $this->createObject($this->getFactory(), 'factoryManager', $target));
    }

    public function dataProviderObjetos()
    {
        return [
            [$this->namespace.'Entity\Product\Product', 'product', null],
        ];
    }

    public function dataProviderManager()
    {
        return [
            [$this->namespace.'Entity\Product\Manager', 'product'],
            [$this->namespace.'Entity\Templates\Manager', 'templates'],
        ];
    }
}
