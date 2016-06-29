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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Sku;

use Gpupo\NetshoesSdk\Entity\Product\Sku\Images;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ImagesTest extends TestCaseAbstract
{
    /**
     * @testdox É uma coleção de objetos ``Gpupo\NetshoesSdk\Entity\Product\Sku\Image``
     */
    public function testFactoryElement()
    {
        $o = new Images(
            [
                [
                    'url' => 'bar',
                ],
            ]
        );

        foreach ($o as $s) {
            $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Product\Sku\Image', $s);
        }
    }
}
