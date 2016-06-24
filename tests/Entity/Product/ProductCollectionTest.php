<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;
use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;

class ProductCollectionTest extends TestCaseAbstract
{
    public function testLinks()
    {
        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/list.json'));

        $collection = $manager->fetch();

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
        $this->assertSame($container->getMetadata()->getSelf(), 'http://sandbox-catalogo-vs.netshoes.local/mp-catalogo-api/rs/v1/products/?page=0&size=20');
    }

    /**
     * @depends testLinks
     */
    public function testMetadataFirst(MetadataContainerAbstract $container)
    {
        $this->assertSame($container->getMetadata()->getFirst(), 'http://sandbox-catalogo-vs.netshoes.local/mp-catalogo-api/rs/v1/products/?page=0&size=20');
    }

    /**
     * @depends testLinks
     */
    public function testMetadataLast(MetadataContainerAbstract $container)
    {
        $this->assertSame($container->getMetadata()->getLast(), 'http://sandbox-catalogo-vs.netshoes.local/mp-catalogo-api/rs/v1/products/?page=0&size=20');
    }

}
