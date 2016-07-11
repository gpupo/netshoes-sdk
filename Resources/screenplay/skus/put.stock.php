<?php
//Atualizar Stock de no mínimo quatro Skus
include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;

    $operation = $manager->saveDetail($factorySkuMod($id), 'Stock');

    if (200 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Atualização de Stock para SKU #' . $id);
    }

    $feedback('Atualizado Stock do SKU /products/' . $id . '/skus/' . $id);
}
