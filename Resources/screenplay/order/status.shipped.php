<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <http://www.g1mr.com/netshoes-sdk/>
 * @version 1
 */

$transport = $sdk->createTransport([
    'carrier'               => 'Correios',
    'trackingNumber'        => 'PJ521644335BR',
    'shipDate'              => '2016-05-10T10:46:00.000-03:00',
    'estimatedDeliveryDate' => '2016-05-10T10:46:00.000-03:00',
]);

$order->getShipping()->setTransport($transport);
$operation = $manager->update($order);

if (200 !== $operation->getHttpStatusCode()) {
    throw new \Exception('FAIL ['.$status.']: #'.$id);
}
