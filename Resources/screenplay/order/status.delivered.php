<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <https://opensource.gpupo.com/netshoes-sdk/>
 * @version 1
 */

$order->getShipping()->getTransport()->setDeliveryDate('2016-05-10T09:44:54.000-03:00');
$operation = $manager->update($order);

if (200 !== $operation->getHttpStatusCode()) {
    throw new \Exception('FAIL ['.$status.']: #'.$id);
}
