<?php

include __DIR__ . '/../common.php';

$manager = $sdk->factoryManager('sku');

$factorySkuMod = function ($id) use ($sdk) {
    
    $data = [
       "sku" => $id,
       "sellPrice"=> 113,
       "listPrice"=> 141,
       "stock"=> 122,
   ];

    return $sdk->createSku($data);
};
