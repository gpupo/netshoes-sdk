<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <http://www.g1mr.com/netshoes-sdk/>
 * @version 1
 */

include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([41, 42, 43, 44] as $i) {
    $id = $centena + $i;
    $data = $makeProduct($id, $i, 'multiple');

    $product = $sdk->createProduct($data);
    $operation = $manager->save($product);

    if (202 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Cadastro Product #'.$id);
    }

    foreach ($data['skus'] as $s) {
        $feedback('Cadastrado Product /products/'.$id.'/skus/'.$s['sku']);
    }
}
