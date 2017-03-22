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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\Metadata\Metadata;
use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;
use Gpupo\NetshoesSdk\Entity\Product\Sku\Item;
use Gpupo\NetshoesSdk\Entity\Product\Sku\SkuCollection;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Sku\SkuCollection
 */
class SkuCollectionTest extends TestCaseAbstract
{
    public function testLinks()
    {
        $manager = $this->getFactory()->factoryManager('sku');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/Sku/list.json'));

        $collection = $manager->fetch(14080);

        return $collection;
    }

    /**
     * @testdox É uma coleção de objetos ``\Gpupo\NetshoesSdk\Entity\Product\Sku\Item``
     * @depends testLinks
     * @covers ::factoryEntity
     */
    public function testfactoryEntity(MetadataContainerAbstract $container)
    {
        $this->assertInstanceOf(MetadataContainerAbstract::class, $container);

        $simple = new SkuCollection(['items' => [['foo' => 'bar']]]);

        foreach ([$simple, $container] as $o) {
            foreach ($o as $s) {
                $this->assertInstanceOf(Item::class, $s);
            }
        }

        $this->assertInstanceOf(Item::class, $o->first());
        $this->assertInstanceOf(Item::class, $o->last());
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
     */
    public function testMetadataSelf(MetadataContainerAbstract $container)
    {
        $this->assertSame($container->getMetadata()->getSelf(), '/v1/products/14080/skus');
    }
}
