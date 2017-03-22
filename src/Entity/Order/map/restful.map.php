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

$put = function ($name) {
    return [
        'PUT',
        '/orders/{itemId}/shippings/{shippingCode}/status/'.$name,
    ];
};

return [
    'save' => [
        'POST',
        '/orders',
    ],
    'fetch' => [
        'GET',
        '/orders?expand=items,shippings,devolutionItems&page={offset}&size={limit}'
        .'&orderStatus={orderStatus}&orderStartDate={orderStartDate}',
    ],
    'findById' => [
        'GET',
        '/orders/{itemId}?expand=items,shippings,devolutionItems',
    ],
    'toApproved'  => $put('approved'),
    'toCanceled'  => $put('canceled'),
    'toDelivered' => $put('delivered'),
    'toInvoiced'  => $put('invoiced'),
    'toShipped'   => $put('shipped'),
];
