<?php

$invoice = $sdk->createInvoice([
    'number'    => 4003,
    'line'      => 1,
    'accessKey' => '1789616901235555001000004003000004003',
    'issueDate' => '2016-05-10T09:44:54.000-03:00',
]);

$order->getShipping()->setInvoice($invoice);

$operation = $manager->updateStatus($order);

if (200 !== $operation->getHttpStatusCode()) {
    throw new \Exception('FAIL ['.$status.']: #' . $id);
}
