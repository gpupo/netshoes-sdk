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

class CommonSchema extends AbstractDecorator implements DecoratorInterface
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

    protected function callOrder($key)
    {
        $dict = [
            'merchant' => 'originSite',
            'price'    => 'totalNet',
            'discount' => 'totalDiscount',
        ];

        if (array_key_exists($key, $dict) && !is_array($dict[$key])) {
            $key = $dict[$key];
        }
        $method = 'get'.ucfirst($key);

        if (method_exists(__CLASS__, $method)) {
            return $this->$method();
        }

        try {
            return $this->getOrder()->$method();
        } catch (\BadMethodCallException $e) {
            error_log('protected function '.$method.'(){}');
        }
    }

    public function toArray()
    {
        $schema = OrderSchema::getInstance()->getSchema();
        $output = [];
        foreach ($schema as $k => $v) {
            $output[$k] = $this->callOrder($k);
        }
        OrderSchema::getInstance()->validate($output);

        return $output;
    }
}
