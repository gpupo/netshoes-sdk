<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <https://opensource.gpupo.com/netshoes-sdk/>
 * @version 1
 */

//As alterações devem incluir department, productType e attributes
include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;
    $data = $makeProduct($id, $i, 'simple', 'modify');

    $data['department'] = 'Beleza';
    $data['productType'] = 'Base';

    $operation = $manager->update($sdk->createProduct($data), $sdk->createProduct([]));

    $feedback('Atualizado parcialmente Product /products/'.$id);
}
