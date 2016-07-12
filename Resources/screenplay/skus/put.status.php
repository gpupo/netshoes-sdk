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

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;

    $data = [
       'sku'    => $id,
       'status' => false,
   ];

    $sku = $sdk->createSku($data);
    $operation = $manager->saveDetail($sku, 'Status');

    if (200 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Update Status SKU #'.$id);
    }

    $feedback('Atualizado o Status do SKU /products/'.$id.'/skus/'.$id);
}
