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

use Gpupo\NetshoesSdk\Entity\Product\Sku\Item;
use Gpupo\NetshoesSdk\Entity\Product\Sku\Manager;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Sku\Manager
 */
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

        $this->assertInstanceOf(Manager::class, $manager);

        return $manager;
    }

    /**
     * @depends testManager
     * @covers ::getClient
     */
    public function testPossuiObjetoClient(Manager $manager)
    {
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Client\Client', $manager->getClient());
    }

    /**
     * @testdox Dá Acesso a detalhes de um SKU
     * @depends testManager
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function findById(Manager $manager)
    {
        $list = $manager->findById(14080);
        $this->assertInstanceOf(Item::class, $list);

        return $list;
    }
}
