<?php

$order->getShipping()->getTransport()->setDeliveryDate('2016-05-10T09:44:54.000-03:00');
$operation = $manager->updateStatus($order);

if (200 !== $operation->getHttpStatusCode()) {
    throw new \Exception('FAIL ['.$status.']: #' . $id);
}
