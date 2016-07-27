<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <http://www.g1mr.com/netshoes-sdk/>
 * @version 1
 */

$invoice = $sdk->createInvoice([
    'number'    => 4003,
    'line'      => 1,
    'accessKey' => '1789616901235555001000004003000004003',
    'issueDate' => '2016-05-10T09:44:54.000-03:00',
]);

$order->getShipping()->setInvoice($invoice);

$operation = $manager->update($order);

if (200 !== $operation->getHttpStatusCode()) {
    throw new \Exception('FAIL ['.$status.']: #'.$id);
}
