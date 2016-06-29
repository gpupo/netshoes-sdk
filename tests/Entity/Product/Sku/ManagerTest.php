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

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = null)
    {
        $manager = $this->getFactory()->factoryManager('sku');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/Sku/list.json'));

        return $manager;
    }

    /**
     * @testdox Administra operações de SKUs
     * @test
     */
    public function testManager()
    {
        $manager = $this->getManager();

        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\Sku\Manager', $manager);

        return $manager;
    }

    /**
     * @depends testManager
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Sku\Manager::getClient
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Client\Client', $manager->getClient());
    }

    /**
     * @testdox Dá Acesso a lista de SKUs de um Product
     * @depends testManager
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Sku\Manager::fetch
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Sku\Manager::execute
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Sku\Manager::factoryMap
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function testFetch($manager)
    {
        $list = $manager->findById(14080);
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\Sku\SkuCollection', $list);

        return $list;
    }
}
