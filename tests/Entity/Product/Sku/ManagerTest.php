<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://www.gpupo.com/>.
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

    protected function createAndRun($method, $same = false)
    {
        $manager = $this->getManager('Update/info-response.json');
        $previousArray = $this->getResourceJson('fixture/Product/Sku/Update/previous.json');
        $currentArray = $this->getResourceJson('fixture/Product/Sku/Update/current.json');
        $previous = $this->getFactory()->createSku((true === $same) ? $currentArray : $previousArray);
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
     * @testdox Não atualiza as informações do SKU desnecessariamente
     * @covers ::updateInfo
     * @test
     */
    public function updateInfoNone()
    {
        $this->assertSame(
            [
            'bypassed' => [
                'info',
            ],

            ],
            $this->createAndRun('updateInfo', true)
        );
    }

    /**
     * @testdox Atualiza os detalhes do SKU
     * @covers ::updateDetails
     * @covers ::saveDetail
     * @test
     */
    public function saveDetail()
    {
        $manager = $this->getManager('Update/info-response.json');
        $currentArray = $this->getResourceJson('fixture/Product/Sku/Update/current.json');
        $sku = $this->getFactory()->createSku($currentArray);
        foreach (['Status', 'Stock', 'Price', 'PriceSchedule'] as $key) {
            $this->assertSame(200, $manager->saveDetail($sku, $key)->getHttpStatusCode());
        }
    }

    /**
     * @testdox Atualiza os detalhes do SKU
     * @covers ::updateDetails
     * @test
     */
    public function updateDetails()
    {
        $expected =
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

            ];

        $this->assertSame(
            $this->shift($expected),
            $this->createAndRun('updateDetails')
        );
    }

    /**
     * @testdox Não atualiza os detalhes do SKU desnecessariamente
     * @covers ::updateDetails
     * @covers ::saveDetail
     * @test
     */
    public function updateDetailsNone()
    {
        $expected = [
            'bypassed' => [
                'Status',
                'Stock',
                'Price',
                'PriceSchedule',
            ],
            ];
        $this->assertSame(
            $this->shift($expected),
            $this->createAndRun('updateDetails', true)
        );
    }

    /**
     * @testdox Atualiza os detalhes e as informações do SKU em uma única operação
     * @covers ::update
     * @test
     */
    public function updateFull()
    {
        $expected = [
            'sku'      => '14080',
            'bypassed' => [],
            'code'     => [
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
        ];

        $this->assertSame(
            $this->shift($expected, true),
            $this->createAndRun('update')
        );
    }

    protected function shift($expected, $full = false)
    {
        $m = $this->proxy(new Manager());
        if (true !== $m->strategy['info']) {
            if (array_key_exists('updated', $expected)) {
                array_pop($expected['updated']);
                array_pop($expected['code']);

                if ($full) {
                    array_shift($expected['updated']);
                    array_shift($expected['code']);
                }
            }

            if (array_key_exists('bypassed', $expected)) {
                array_pop($expected['bypassed']);
            }
            //array_shift($expected['code']);
        }

        return $expected;
    }
}
