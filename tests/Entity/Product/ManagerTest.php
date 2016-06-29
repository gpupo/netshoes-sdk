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

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;
use Gpupo\NetshoesSdk\Entity\Product\Manager;

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
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::getClient
     */
    public function testGetClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Client\Client', $manager->getClient());
    }

    /**
     * @depends testManager
     * @testdox Obtem a lista de produtos cadastrados
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::fetch
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::execute
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::factoryMap
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
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::findById
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::execute
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::factoryMap
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
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::findById
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::execute
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::factoryMap
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function testFindByFail()
    {
        $manager = $this->getManager('notfound.json', 404);
        $product = $manager->findById(88888);
        $this->assertFalse($product);
    }
}
