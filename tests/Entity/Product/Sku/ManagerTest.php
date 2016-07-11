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

use Gpupo\NetshoesSdk\Client\Client;
use Gpupo\NetshoesSdk\Entity\Product\Sku\Item;
use Gpupo\NetshoesSdk\Entity\Product\Sku\Manager;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Sku\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = 'list.json')
    {
        $manager = $this->getFactory()->factoryManager('sku');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/Sku/'.$filename));

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
        $this->assertInstanceOf(Client::class, $manager->getClient());
    }

    /**
     * @testdox Dá Acesso a detalhes de um SKU
     * @depends testManager
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     * @covers ::findById
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function findById(Manager $manager)
    {
        $list = $manager->findById(14080);
        $this->assertInstanceOf(Item::class, $list);

        return $list;
    }

    protected function createAndRun($method)
    {
        $manager = $this->getManager('Update/info-response.json');
        $previousArray = $this->getResourceJson('fixture/Product/Sku/Update/previous.json');
        $currentArray = $this->getResourceJson('fixture/Product/Sku/Update/current.json');
        $previous = $this->getFactory()->createSku($previousArray);
        $sku = $this->getFactory()->createSku($currentArray);
        $operation = $manager->$method($sku, $previous);

        return $operation;
    }

    /**
     * @testdox Atualiza as informações do SKU
     * @covers ::updateInfo
     * @test
     */
    public function updateInfo()
    {
        $this->assertSame(
            [
            'code' => [
                'info' => 200,
            ],
            'updated' => [
                'info',
            ],

            ],
            $this->createAndRun('updateInfo')
        );
    }

    /**
     * @testdox Atualiza os detalhes do SKU
     * @covers ::updateDetails
     * @test
     */
    public function updateDetails()
    {
        $this->assertSame(
            [
            'code' => [
                'Status'        => 200,
                'Stock'         => 200,
                'Price'         => 200,
                'PriceSchedule' => 200,
            ],
            'updated' => [
                'Status',
                'Stock',
                'Price',
                'PriceSchedule',
            ],

            ],
            $this->createAndRun('updateDetails')
        );
    }

    /**
     * @testdox Atualiza os detalhes e as informações do SKU em uma única operação
     * @covers ::update
     * @test
     */
    public function updateFull()
    {
        $this->assertSame([
                'sku' => '14080',
                'bypassed' => [],
                'code' => [
                    'info'          => 200,
                    'Status'        => 200,
                    'Stock'         => 200,
                    'Price'         => 200,
                    'PriceSchedule' => 200,
                ],
                'updated' => [
                    'info',
                    'Status',
                    'Stock',
                    'Price',
                    'PriceSchedule',
                ],
            ],
            $this->createAndRun('update')
        );
    }
}
