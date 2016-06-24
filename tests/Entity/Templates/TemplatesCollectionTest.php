<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\Tests\NetshoesSdk\Entity\Templates;

use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class TemplatesCollectionTest extends TestCaseAbstract
{
    public function testLinks()
    {
        $manager = $this->getFactory()->factoryManager('templates');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Templates/brands.json'));

        $collection = $manager->fetchByRoute('brands');

        return $collection;
    }

    /**
     * @depends testLinks
     */
    public function testInstance(MetadataContainerAbstract $container)
    {
        $this->assertInstanceOf('\Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract', $container);
    }

    /**
     * @depends testLinks
     */
    public function testPossuiObjetoMetadata(MetadataContainerAbstract $container)
    {
        $this->assertInstanceOf('\Gpupo\CommonSdk\Entity\Metadata\Metadata', $container->getMetadata());
    }

    /**
     * @depends testLinks
     */
    public function testMetadataSelf(MetadataContainerAbstract $container)
    {
        $this->assertSame($container->getMetadata()->getSelf(), '/v1/brands');
    }
}
