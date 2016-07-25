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

$items = [];

foreach ($foreign->get('acceptedOffer') as $sku) {
    $items[] = [
        'itemId'            => $sku['itemOffered']['sku'],
        'ean'               => '',
        'brand'             => '',
        'name'              => $sku['itemOffered']['name'],
        'quantity'          => $sku['eligibleQuantity']['value'],
        'sku'               => $sku['itemOffered']['sku'],
        'departmentName'    => '',
        'departmentCode'    => '',
        'totalGross'        => '',
        'totalCommission'   => '',
        'totalDiscount'     => '',
        'totalFreight'      => '',
        'totalNet'          => '',
        'grossUnitValue'    => '',
        'discountUnitValue' => '',
        'netUnitValue'      => '',
        'color'             => '',
        'flavor'            => '',
        'size'              => '',
    ];
}

$customer = [
    'document'         => '',
    'stateInscription' => '',
    'customerName'     => '',
    'recipientName'    => '',
    'tradeName'        => '',
    'cellPhone'        => '',
    'landLine'         => '',
    'address'          => [
        'neighborhood' => '',
        'postalCode'   => '',
        'city'         => '',
        'complement'   => '',
        'state'        => '',
        'street'       => '',
        'number'       => '',
        'reference'    => '',
    ],
];

$shipping = [
    'shippingCode'  => '',
    'status'        => $foreign->get('orderStatus'),
    'freightAmount' => '',
    'country'       => '',
    'customer'      => $customer,
    'sender'        => [],
    'items'         => $items,
];

return [
    'orderNumber'   => $foreign->get('orderNumber'),
    'originSite'    => $foreign->get('merchant')['name'],
    'orderStatus'   => $foreign->get('orderStatus'),
    'orderDate'     => $foreign->get('orderDate'),
    'totalDiscount' => $foreign->get('discount'),
    'totalNet'      => $foreign->get('price'),
    'totalQuantity' => $foreign->get('quantity'),
    'shippings'     => [$shipping],
];
