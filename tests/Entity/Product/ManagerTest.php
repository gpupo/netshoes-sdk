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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\NetshoesSdk\Client\Client;
use Gpupo\NetshoesSdk\Entity\Product\Manager;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = null, $code = 200)
    {
        if (empty($filename)) {
            $filename = 'list.json';
        }

        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/'.$filename, $code));

        return $manager;
    }
    /**
     * @testdox Administra operações de Products
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
     * @testdox Possui objeto Client
     * @covers ::getClient
     */
    public function testGetClient($manager)
    {
        $this->assertInstanceOf(Client::class, $manager->getClient());
    }

    /**
     * @depends testManager
     * @testdox Obtem a lista de produtos cadastrados
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function testFetch($manager)
    {
        $list = $manager->fetch();
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\ProductCollection', $list);

        return $list;
    }

    /**
     * @testdox Recupera informações de um produto especifico a partir de Id
     * @covers ::findById
     * @covers ::execute
     * @covers ::factoryMap
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function testFindBy()
    {
        $manager = $this->getManager('item.json');
        $product = $manager->findById(14080);
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\Product', $product);
        $this->assertSame('14080', $product->getProductId());
        $this->assertSame('14080', $product->getId());
    }

    /**
     * @testdox Recebe false em caso de produto inexistente
     * @covers ::findById
     * @covers ::execute
     * @covers ::factoryMap
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function testFindByFail()
    {
        $manager = $this->getManager('notfound.json', 404);
        $product = $manager->findById(88888);
        $this->assertFalse($product);
    }

    /**
     * @testdox Recebe false em caso de produto inexistente
     * @covers ::save
     * @test
     */
    public function save()
    {
        $manager = $this->getManager('item.json', 202);
        $product = $this->getFactory()->createProduct();
        $this->assertSame(202, $manager->save($product)->getHttpStatusCode());
    }

    /**
     * @testdox A Atualização de um Product requer que ele contenha Skus
     * @covers ::update
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Product precisa conter SKU!
     * @test
     */
    public function testUpdateFailSku()
    {
        $manager = $this->getManager();
        $product = $this->getFactory()->createProduct();
        $manager->update($product, $product);
    }

    /**
     * @testdox Atualiza o SKU de um produto
     * @covers ::update
     * @test
     */
    public function testUpdate()
    {
        $manager = $this->getManager('Update/info-response.json');
        $previousArray = $this->getResourceJson('fixture/Product/Update/previous.json');
        $currentArray = $this->getResourceJson('fixture/Product/Update/current.json');
        $previous = $this->getFactory()->createProduct($previousArray);
        $current = $this->getFactory()->createProduct($currentArray);
        $operation = $manager->update($current, $previous);

        $this->assertSame(
            [
                'patch' => false,
                'skus' => [[
                    'sku'      => '14080',
                    'bypassed' => [
                        'info',
                        'Status',
                        'Price',
                    ],
                    'code' => [
                        'Stock'         => 200,
                        'PriceSchedule' => 200,
                    ],
                    'updated' => [
                        'Stock',
                        'PriceSchedule',
                    ],
                ],
                ], ],
            $operation
        );
    }

    /**
     * @testdox Atualiza parcialmente as informações de um produto
     * @covers ::patch
     * @test
     */
    public function patch()
    {
        $manager = $this->getManager('Update/patch-response.json');
        $previousArray = $this->getResourceJson('fixture/Product/Update/previous.json');
        $currentArray = $this->getResourceJson('fixture/Product/Update/patch.json');
        $previous = $this->getFactory()->createProduct($previousArray);
        $current = $this->getFactory()->createProduct($currentArray);
        $operation = $manager->update($current, $previous);

        $this->assertSame(
            [
                'patch' => [
                    'fields'=> ['department','productType'],
                    'response_code' => 200,
                ],
                'skus' => [[
                    'sku'      => '14080',
                    'bypassed' => [
                        'info',
                        'Status',
                        'Price',
                    ],
                    'code' => [
                        'Stock'         => 200,
                        'PriceSchedule' => 200,
                    ],
                    'updated' => [
                        'Stock',
                        'PriceSchedule',
                    ],
                ],
                ], ],
            $operation
        );
    }
}
