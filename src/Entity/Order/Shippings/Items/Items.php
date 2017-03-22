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

namespace Gpupo\NetshoesSdk\Entity\Order\Shippings\Items;

use Gpupo\CommonSdk\Entity\CollectionAbstract;

class Items extends CollectionAbstract
{
    public function factoryElement($data)
    {
        return new Item($data);
    }

    private function to($method)
    {
        $array = [];
        foreach ($this->all() as $item) {
            $array[] = $item->$method();
        }

        return $array;
    }

    public function toLog()
    {
        return $this->to('toLog');
    }

    public function toSchema()
    {
        return $this->to('toSchema');
    }
}
