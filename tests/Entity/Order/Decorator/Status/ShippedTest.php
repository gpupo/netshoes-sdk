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

namespace Gpupo\Tests\NetshoesSdk\Entity\Order\Decorator\Status;

use Gpupo\NetshoesSdk\Entity\Order\Decorator\Status\Shipped;
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\Tests\NetshoesSdk\Entity\Order\Decorator\AbstractDecoratorTestCase;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Order\Decorator\Status\Shipped
 */
class ShippedTest extends AbstractDecoratorTestCase
{
    protected $target = 'shipped';

    protected function factoryDecorator(Order $order, $data = [])
    {
        if (array_key_exists('carrier', $data)) {
            $order->getShipping()->getTransport()->setCarrier($data['carrier'])
                ->setTrackingNumber($data['trackingNumber'])
                ->setShipDate($data['deliveredCarrierDate'])
                ->setEstimatedDeliveryDate($data['estimatedDelivery']);
        }

        return parent::factoryDecorator($order, $data);
    }

    protected function factory($data = [])
    {
        return new Shipped($data);
    }
}
