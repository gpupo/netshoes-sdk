<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <https://opensource.gpupo.com/netshoes-sdk/>
 * @version 1
 */

include __DIR__.'/../common.php';

$manager = $sdk->factoryManager('sku');

$factorySkuMod = function ($id) use ($sdk) {

    $data = [
       'sku'       => $id,
       'sellPrice' => 113,
       'listPrice' => 141,
       'stock'     => 122,
   ];

    return $sdk->createSku($data);
};
