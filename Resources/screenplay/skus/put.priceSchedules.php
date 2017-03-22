<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <https://opensource.gpupo.com/netshoes-sdk/>
 * @version 1
 */

include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;

    $operation = $manager->saveDetail($factorySkuMod($id), 'PriceSchedule');

    if (201 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Agendamento de preço para SKU #'.$id);
    }

    $feedback('Agendamento de preço do SKU /products/'.$id.'/skus/'.$id);
}
