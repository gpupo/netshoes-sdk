<?php
//Criar agendamento de preço para no mínimo quatro Skus.
include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;

    $operation = $manager->saveDetail($factorySkuMod($id), 'PriceSchedule');

    if (201 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Agendamento de preço para SKU #' . $id);
    }

    $feedback('Agendamento de preço do SKU /products/' . $id . '/skus/' . $id);
}
