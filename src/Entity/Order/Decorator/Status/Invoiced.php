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

namespace Gpupo\NetshoesSdk\Entity\Order\Decorator\Status;

use Gpupo\NetshoesSdk\Entity\Order\Decorator\AbstractDecorator;
use Gpupo\NetshoesSdk\Entity\Order\Decorator\DecoratorInterface;

class Invoiced extends AbstractDecorator implements DecoratorInterface
{
    protected $name = 'Invoiced';

    protected function factoryArray()
    {
        $invoice = $this->getOrder()->getInvoice();
        $invoice->check();

        return [
            'status'    => 'Invoiced',
            'number'    => $invoice->getNumber(),
            'line'      => $invoice->getLine(),
            'key'       => $invoice->getAccessKey(),
            'issueDate' => $invoice->getIssueDate(),
        ];
    }
}
