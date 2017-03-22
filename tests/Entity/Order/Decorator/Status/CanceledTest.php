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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Decorator\Status;

use Gpupo\NetshoesSdk\Entity\Order\Decorator\Status\Canceled;
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\Tests\NetshoesSdk\Entity\Order\Decorator\AbstractDecoratorTestCase;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Decorator\Status\Canceled
 */
class CanceledTest extends AbstractDecoratorTestCase
{
    protected $target = 'canceled';

    protected function factoryDecorator(Order $order, $data = [])
    {
        if (array_key_exists('cancellationReason', $data)) {
            $order->getShipping()->setCancellationReason($data['cancellationReason']);
        }

        return parent::factoryDecorator($order, $data);
    }

    protected function factory($data = [])
    {
        return new Canceled($data);
    }

    /**
     * @testdox Falha ao validar ``Order`` sem ``Cancellation Reason``
     * @test
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Order incomplete for status [Cancellation Reason]
     * @dataProvider dataProviderOrders
     * @covers ::toArray
     * @covers ::validate
     */
    public function validateCancellationReason(Order $order)
    {
        $decorator = $this->factoryDecorator($order, $this->getExpectedArray());
        $decorator->getOrder()->getShippings()->first()->setCancellationReason('');
        $decorator->validate();
    }
}
