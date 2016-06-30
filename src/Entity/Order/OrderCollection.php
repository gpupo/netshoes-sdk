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

namespace Gpupo\NetshoesSdk\Entity\Order;

use Gpupo\NetshoesSdk\Entity\AbstractMetadata;

class OrderCollection extends AbstractMetadata
{
    /**
     * @codeCoverageIgnore
     */
    protected function getKey()
    {
        return 'items';
    }

    protected function factoryEntity(array $data)
    {
        return new Order($data);
    }
}
