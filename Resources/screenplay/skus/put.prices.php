<?php
//Atualizar preço de no mínimo quatro Skus
include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;

    $operation = $manager->saveDetail($factorySkuMod($id), 'Price');

    if (200 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Atualização de preço para SKU #' . $id);
    }

    $feedback('Atualizado preço do SKU /products/' . $id . '/skus/' . $id);
}
