<?php

$operation = $manager->updateStatus($order);

if (200 !== $operation->getHttpStatusCode()) {
    throw new \Exception('FAIL ['.$status.']: #' . $id);
}
