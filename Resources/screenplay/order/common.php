<?php

include __DIR__ . '/../common.php';

$manager = $sdk->factoryManager('order');

$createOrder = function ($id) use ($sdk) {
    $text = file_get_contents(__DIR__.'/order.json');
    $data = json_decode($text, true);
    $data['orderNumber'] = $id;
    $data['originNumber'] = '7'.$id;
    $order = $sdk->createOrder($data);

    return $order;
};
