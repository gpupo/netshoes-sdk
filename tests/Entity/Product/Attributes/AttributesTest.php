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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product\Attributes;

use Gpupo\NetshoesSdk\Entity\Product\Attributes\Attributes;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class AttributesTest extends TestCaseAbstract
{
    /**
     * @testdox É uma coleção de objetos ``Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute``
     */
    public function testFactoryElement()
    {
        $array = [
            [
                'name'  => 'foo',
                'value' => 'bar',
            ],
        ];

        $o = new Attributes($array);

        foreach ($o as $s) {
            $this->assertInstanceOf('Gpupo\NetshoesSdk\Entity\Product\Attributes\Attribute', $s);
        }

        $this->assertSame(json_encode($array), $o->toJson());
    }
}
