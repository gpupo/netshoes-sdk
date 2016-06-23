<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
            [$this->namespace . 'Entity\Product\Product', 'product', null],
        ];
    }

    public function dataProviderManager()
    {
        return [
            [$this->namespace . 'Entity\Product\Manager', 'product'],
            [$this->namespace . 'Entity\Templates\Manager', 'templates'],
        ];
    }
}
