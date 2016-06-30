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

namespace Gpupo\NetshoesSdk\Entity\Order\Decorator\Status;

use Gpupo\NetshoesSdk\Entity\Order\Decorator\AbstractDecorator;
use Gpupo\NetshoesSdk\Entity\Order\Decorator\DecoratorInterface;

class Invoiced extends AbstractDecorator implements DecoratorInterface
{
    public function toArray()
    {
        if (true !== $this->validate()) {
            throw new \InvalidArgumentException("Order incompleta para esta mudanca de Status");
        }


        //{"status":"Invoiced","number":4003,"line":1,"key":"1789616901235555001000004003000004003","issueDate":"2016-05-10T09:44:54.000-03:00"}

        return [
        ];
    }
}
