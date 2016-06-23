<?php

/*
 * This file is part of gpupo/netshoes-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/netshoes-sdk/>.
 */
namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = null)
    {
        if (empty($filename)) {
            $filename = 'list.json';
        }

        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/' . $filename));

        return $manager;
    }

    public function testÉOAdministradorDeProdutos()
    {
        $manager = $this->getManager();

        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\Manager', $manager);

        return $manager;
    }

    /**
     * @depends testÉOAdministradorDeProdutos
     */
    public function testPossuiObjetoPool($manager)
    {
        $this->assertInstanceOf('\Gpupo\CommonSdk\Pool', $manager->getPool());
    }

    /**
     * @depends testÉOAdministradorDeProdutos
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Client\Client', $manager->getClient());
    }

    /**
     * @depends testÉOAdministradorDeProdutos
     */
    public function testObtemListaDeProdutosCadastrados($manager)
    {
        $list = $manager->fetch();
        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\ProductCollection', $list);

        return $list;
    }
}
