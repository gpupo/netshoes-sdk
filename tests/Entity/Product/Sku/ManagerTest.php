<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Sku;

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = null)
    {
        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/Sku/item.json'));

        return $manager;
    }

    public function testManager()
    {
        $manager = $this->getManager();

        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Entity\Product\Manager', $manager);

        return $manager;
    }

}
