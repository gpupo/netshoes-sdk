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

use Gpupo\CommonSchema\Trading\OrderSchema;
use Gpupo\CommonSchema\Trading\OrderTrait;
use Gpupo\CommonSchema\Trading\TradingInterface;

class CommonSchema extends AbstractDecorator implements DecoratorInterface, TradingInterface
{
    use OrderTrait;

    protected function getAcceptedOffer()
    {
        return $this->getOrder()->getItems()->toSchema();
    }

    protected function getCustomer()
    {
        return $this->getOrder()->getShipping()->getCustomer()->toSchema();
    }

    protected function getBillingAddress()
    {
        return $this->getOrder()->getShipping()->getCustomer()->getAddress()->toSchema();
    }

    protected function getMerchant()
    {
        return ['name' => $this->getOrder()->getOriginSite()];
    }

    protected function getPrice()
    {
        return $this->getOrder()->getTotalNet();
    }

    protected function getDiscount()
    {
        return $this->getOrder()->getTotalDiscount();
    }

    protected function getOrderNumber()
    {
        return $this->getOrder()->getOrderNumber();
    }

    protected function getOrderStatus()
    {
        return $this->getOrder()->getOrderStatus();
    }

    protected function getOrderDate()
    {
        return $this->getOrder()->getOrderDate();
    }

    public function fetch($key)
    {
        $method = 'get'.ucfirst($key);

        if (method_exists(__CLASS__, $method)) {
            return $this->$method();
        }

        error_log('protected function '.$method.'(){} missed!');
    }

    public function toArray()
    {
        $schema = OrderSchema::getInstance()->getSchema();
        $output = [];
        foreach ($schema as $k => $v) {
            $output[$k] = $this->fetch($k);
        }
        OrderSchema::getInstance()->validate($output);

        return $output;
    }
}
