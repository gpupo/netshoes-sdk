<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\Tests\NetshoesSdk\Entity\Templates;

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class BrandTest extends TestCaseAbstract
{
    protected function factory($data)
    {
        return $this->getFactory()->createTemplate($data);
    }

    public function testList()
    {
        $manager = $this->getFactory()->factoryManager('templates');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Templates/brands.json'));

        $list = $manager->fetchByRoute('brands');

        $this->assertCount(65, $list->toArray());

        foreach ($list as $item) {
            $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Templates\Item', $item);
        }

        return $list;
    }

    /**
     * @depends testList
     */
    public function testItem($list)
    {
        $i = 0;
        foreach ($list as $item) {
            ++$i;
            $this->assertEquals($i, $item->getCode());
            $this->assertNotEmpty($item->getName());
            $this->assertEquals((string) "0" . $i, $item->getExternalCode());
        }
    }
}
