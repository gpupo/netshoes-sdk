<?php
//Cadastro de quatro produtos contendo apenas um Sku
include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24, 35, 36, 37, 38, 39] as $i) {
    $id = $centena + $i;
    $data = $makeProduct($id, $i);
    $product = $sdk->createProduct($data);
    $operation = $manager->save($product);

    if (202 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Cadastro Product #' . $id);
    }

    $feedback('Cadastrado Product /products/' . $id . '/skus' . $id);
}
