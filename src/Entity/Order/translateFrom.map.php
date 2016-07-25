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

$a = function ($key, $array) {
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
};

return [
'agreedDate'          => 'string',
'paymentDate'         => 'string',
'orderDate'           => 'string',
'orderNumber'         => $foreign->get('orderNumber'),
'originNumber'        => 'string',
'totalQuantity'       => 'string',
'originSite'          => 'string',
'businessUnit'        => 'string',
'orderStatus'         => 'string',
'orderType'           => 'string',
'devolutionRequested' => 'string',
'exchangeRequested'   => 'string',
'totalGross'          => 'string',
'totalCommission'     => 'string',
'totalDiscount'       => 'string',
'totalFreight'        => 'string',
'totalNet'            => 'string',
'shippings'           => [
    [
    'shippingCode'       => 'string',
    'status'             => 'string',
    'cancellationReason' => 'string',
    'freightAmount'      => 'string',
    'country'            => 'string',
    'customer'           => [
        'document'         => 'string',
        'stateInscription' => 'string',
        'customerName'     => 'string',
        'recipientName'    => 'string',
        'tradeName'        => 'string',
        'cellPhone'        => 'string',
        'landLine'         => 'string',
        'address'          => [
            'neighborhood' => 'string',
            'postalCode'   => 'string',
            'city'         => 'string',
            'complement'   => 'string',
            'state'        => 'string',
            'street'       => 'string',
            'number'       => 'string',
            'reference'    => 'string',
        ],
    ],
    'sender' => [
        'supplierCnpj' => 'string',
        'sellerCode'   => 'string',
        'sellerName'   => 'string',
        'supplierName' => 'string',
    ],
    'items' => [
        [
            'itemId'            => 'string',
            'ean'               => 'string',
            'brand'             => 'string',
            'name'              => 'string',
            'quantity'          => 'string',
            'sku'               => 'string',
            'departmentName'    => 'string',
            'departmentCode'    => 'string',
            'totalGross'        => 'string',
            'totalCommission'   => 'string',
            'totalDiscount'     => 'string',
            'totalFreight'      => 'string',
            'totalNet'          => 'string',
            'grossUnitValue'    => 'string',
            'discountUnitValue' => 'string',
            'netUnitValue'      => 'string',
            'color'             => 'string',
            'flavor'            => 'string',
            'size'              => 'string',
        ],
    ],
    ],
],
];
