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
use Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice;

class Invoiced extends AbstractDecorator implements DecoratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function validate()
    {

        if (true !== parent::validate()) {
            return $this->invalid('order');
        }

        $invoice = $this->getOrder()->getInvoice();

        if (!$invoice instanceof Invoice) {
            return $this->invalid('Invoice');
        }

        if (100 > intval($invoice->getNumber())) {
            return $this->invalid('Invoice Number');
        }

        if (1 > intval($invoice->getLine())) {
            return $this->invalid('Invoice Line');
        }

        if (10 > strlen($invoice->getAccessKey())) {
            return $this->invalid('Invoice Acess Key');
        }

        if (10 > strlen($invoice->getIssueDate())) {
            return $this->invalid('Invoice Issue Date');
        }

        return true;
    }

    public function toArray()
    {
        if (true !== $this->validate()) {
            $this->fail('Invoiced');
        }

        $invoice = $this->getOrder()->getInvoice();

        return [
            'status'    => 'Invoiced',
            'number'    => $invoice->getNumber(),
            'line'      => $invoice->getLine(),
            'key'       => $invoice->getAccessKey(),
            'issueDate' => $invoice->getIssueDate(),
        ];
    }
}
