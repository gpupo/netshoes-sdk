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

class CommonSchema extends AbstractDecorator implements DecoratorInterface
{
    protected $dict = [
        'merchant' => [
            'name' => 'string',
        ],
        'price'         => 'totalNet',
        'acceptedOffer' => [
            [
                'itemOffered' => [
                'name'  => 'string',
                'sku'   => 'string',
                'url'   => 'string',
                'image' => 'string',
                ],
                'price'            => 'string',
                'priceCurrency'    => 'string',
                'eligibleQuantity' => [
                'value' => 'string',
                ],
                'seller' => [
                'name' => 'string',
                ],
            ],
        ],
        'discount' => 'totalDiscount',
        'customer' => [
            'name' => 'string',
        ],
        'billingAddress' => [
            'name'            => 'string',
            'streetAddress'   => 'string',
            'addressLocality' => 'string',
            'addressRegion'   => 'string',
            'addressCountry'  => 'string',
        ],
    ];

    protected function getMerchant()
    {
        $key = $this->callOrder('originSite');
        $dict = [
            ''   => '',
            'ZT' => 'Zattini',
            'NS' => 'Netshoes',
        ];

        return $dict[$key];
    }

    protected function getPriceCurrency()
    {
        'BRL';
    }

    protected function getAcceptedOffer()
    {
        return $this->getOrder()->getItems()->toSchema();
    }

    protected function getUrl()
    {
    }

    protected function getPaymentMethod()
    {
    }
    protected function getPaymentMethodId()
    {
    }
    protected function getIsGift()
    {
    }
    protected function getDiscountCurrency()
    {
    }
    protected function getCustomer()
    {
    }
    protected function getBillingAddress()
    {
    }

    protected function callOrder($key)
    {
        if (array_key_exists($key, $this->dict) && !is_array($this->dict[$key])) {
            $key = $this->dict[$key];
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
