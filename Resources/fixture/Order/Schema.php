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
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\NetshoesSdk;

use Gpupo\CommonSchema\AbstractSchema;

class Schema extends AbstractSchema
{
    public function getSchema()
    {
        return include __DIR__.'/array.php';
    }

    public function getRawSchema()
    {
        $content = file_get_contents(__DIR__.'/schema.json');

        return $this->load(json_decode($content, true));
    }
}
