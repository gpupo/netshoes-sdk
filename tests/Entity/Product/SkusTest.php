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

use Gpupo\NetshoesSdk\Entity\Product\Skus;
use Gpupo\NetshoesSdk\Entity\Product\Sku\Item;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Skus
 */
class SkusTest extends TestCaseAbstract
{
    /**
     * @testdox Encontra um Sku pelo Id
     * @test
     * @small
     */
    public function findById()
    {
        $array = [];

        $list = ['1924', '5672', '9999'];

        foreach($list as $id) {
            $array[$id] = [
               'sku'         => $id,
               'name'        => uniqid(),
           ];
        }

        $skus = new Skus($array);

        $this->assertNull($skus->findById(1));

        foreach($list as $id) {
            $sku = $skus->findById($id);
            $this->assertInstanceOf(Item::class, $sku);
            $this->assertSame($id, $sku->getId());
            $this->assertSame($array[$id]['name'], $sku->getName());
        }
    }
}
