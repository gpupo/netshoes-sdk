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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\Metadata\Metadata;
use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;
use Gpupo\NetshoesSdk\Entity\Product\Product;
use Gpupo\NetshoesSdk\Entity\Product\ProductCollection;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\ProductCollection
 */
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
     * @testdox É uma coleção de objetos ``\Gpupo\NetshoesSdk\Entity\Product\Product``
     * @depends testLinks
     * @covers ::factoryEntity
     */
    public function testfactoryEntity(MetadataContainerAbstract $container)
    {
        $this->assertInstanceOf(MetadataContainerAbstract::class, $container);

        $simple = new ProductCollection(['items' => [['foo' => 'bar']]]);

        foreach ([$simple, $container] as $o) {
            foreach ($o as $s) {
                $this->assertInstanceOf(Product::class, $s);
            }
        }

        $this->assertInstanceOf(Product::class, $o->first());
        $this->assertInstanceOf(Product::class, $o->last());
    }

    /**
     * @depends testLinks
     */
    public function testPossuiObjetoMetadata(MetadataContainerAbstract $container)
    {
        $this->assertInstanceOf(Metadata::class, $container->getMetadata());
    }

    /**
     * @depends testLinks
     * @covers \Gpupo\NetshoesSdk\Entity\AbstractMetadata::cutMetadata
     * @covers \Gpupo\NetshoesSdk\Entity\AbstractMetadata::normalizeMetas
     */
    public function testMetadataSelf(MetadataContainerAbstract $container)
    {
        $this->assertSame($container->getMetadata()->getSelf(), '/v1/products/?page=0&size=20');
    }

    /**
     * @depends testLinks
     * @covers \Gpupo\NetshoesSdk\Entity\AbstractMetadata::cutMetadata
     * @covers \Gpupo\NetshoesSdk\Entity\AbstractMetadata::normalizeMetas
     */
    public function testMetadataFirst(MetadataContainerAbstract $container)
    {
        $this->assertSame($container->getMetadata()->getFirst(), '/v1/products/?page=0&size=20');
    }

    /**
     * @depends testLinks
     * @covers \Gpupo\NetshoesSdk\Entity\AbstractMetadata::cutMetadata
     * @covers \Gpupo\NetshoesSdk\Entity\AbstractMetadata::normalizeMetas
     */
    public function testMetadataLast(MetadataContainerAbstract $container)
    {
        $this->assertSame($container->getMetadata()->getLast(), '/v1/products/?page=0&size=20');
    }
}
