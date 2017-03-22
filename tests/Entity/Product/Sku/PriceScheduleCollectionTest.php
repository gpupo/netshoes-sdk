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

use Gpupo\NetshoesSdk\Entity\Product\Sku\Item;
use Gpupo\NetshoesSdk\Entity\Product\Sku\PriceSchedule;
use Gpupo\NetshoesSdk\Entity\Product\Sku\PriceScheduleCollection;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Sku\PriceScheduleCollection
 */
class PriceScheduleCollectionTest extends TestCaseAbstract
{
    /**
     * @testdox É uma coleção de objetos ``PriceSchedule``
     * @covers ::getCurrent
     * @covers ::factoryEntity
     */
    public function testGetCollection()
    {
        $manager = $this->getFactory()->factoryManager('sku');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Product/Sku/priceScheduleCollection.json'));
        $manager = $this->proxy($manager);

        $sku = new Item([
            'sku' => '14080',
        ]);

        $collection = $manager->getPriceScheduleCollection($sku);

        return $collection;
    }

    /**
     * @testdox ``getCurrent()`` Calcula o agendamento válido
     * @depends testGetCollection
     * @covers ::getCurrent
     */
    public function testGetCurrent(PriceScheduleCollection $container)
    {
        $this->assertSame(88.89, $container->getCurrent()->getPriceTo());
    }

    /**
     * @testdox ``getCurrent()`` retorna null quando a lista está vazia
     * @depends testGetCollection
     * @covers ::getCurrent
     */
    public function testGetCurrentNull(PriceScheduleCollection $container)
    {
        $container->clear();
        $this->assertNull($container->getCurrent());
    }
}
