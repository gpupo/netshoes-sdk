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

namespace Gpupo\NetshoesSdk\Entity\Order\Decorator;

use Gpupo\Common\Entity\Collection;
use Gpupo\NetshoesSdk\Entity\Order\Order;

abstract class AbstractDecorator extends Collection
{
    public function setOrder(Order $order)
    {
        $this->set('order', $order);

        return $this;
    }

    public function validate()
    {
        try {
            $this->getOrder();
        } catch (\Exception $e) {
            error_log('Order decorator validation:' . $e->getMessage());

            return false;
        }

        return true;
    }

}
