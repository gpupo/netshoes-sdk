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

class Canceled extends AbstractDecorator implements DecoratorInterface
{
    protected $name = 'Canceled';

    public function validate()
    {
        parent::validate();

        $reason = $this->getOrder()->getShipping()->getCancellationReason();

        if (empty($reason)) {
            $this->fail('Cancellation Reason');
        }
    }

    protected function factoryArray()
    {
        return [
            'status'             => 'Canceled',
            'cancellationReason' => $this->getOrder()->getShipping()->getCancellationReason(),
        ];
    }
}
