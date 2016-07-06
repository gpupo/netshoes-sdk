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

use Gpupo\NetshoesSdk\Entity\AbstractManager;

class Manager extends AbstractManager
{
    protected $entity = 'Order';

    /**
     * @codeCoverageIgnore
     */
    protected function setUp()
    {
        $this->maps = include 'map.php';
    }

    protected function factoryDecorator(Order $order, $decoratorName)
    {
        $className = __NAMESPACE__.'\\Decorator\\'.$decoratorName;
        $instance = new $className();
        $instance->setOrder($order);

        return $instance;
    }

    public function updateStatus(Order $order)
    {
        $status = $order->getOrderStatus();

        $list = ['approved', 'canceled', 'delivered', 'invoiced', 'shipped'];

        if (in_array($status, $list, true)) {
            $decorator = $this->factoryDecorator($order, 'Status\\'.ucfirst($status));
            $json = $decorator->toJson();
            $mapKey = 'to'.ucfirst($status);
            $shipping = $order->getShipping();
            $code = $shipping->getShippingCode();
            $shipping->toJson();
            $map = $this->factoryMap($mapKey, [
                'orderNumber'  => $order->getOrderNumber(),
                'shippingCode' => $code,
            ]);

            $this->execute($map, $json);

            return true;
        }

        throw new \InvalidArgumentException('Order Status não suportado', 1);
    }
}
