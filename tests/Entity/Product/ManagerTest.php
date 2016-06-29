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
    protected function getManager($filename = null)
    {
        if (empty($filename)) {
            $filename = 'list.json';
        }

        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/'.$filename));

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
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::getClient
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Client\Client', $manager->getClient());
    }

    /**
     * @depends testManager
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::fetch
     */
    public function testObtemListaDeProdutosCadastrados($manager)
    {
        $list = $manager->fetch();
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\ProductCollection', $list);

        return $list;
    }

    /**
     * @covers \Gpupo\NetshoesSdk\Entity\Product\Manager::findById
     */
    public function testRecuperaInformacoesDeUmProdutoEspecificoAPartirDeId()
    {
        $manager = $this->getManager('item.json');
        $product = $manager->findById(14080);
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\Product', $product);
        $this->assertSame('14080', $product->getProductId());
        $this->assertSame('14080', $product->getId());
    }
}
