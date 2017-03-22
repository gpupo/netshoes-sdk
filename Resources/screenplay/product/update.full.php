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

foreach ([35, 36, 37, 38, 39] as $i) {
    $id = $centena + $i;
    $previousData = $makeProduct($id, $i, 'simple', 'modify');
    $previous = $sdk->createProduct($previousData);
    $previousData['department'] = 'Beleza';
    $previousData['productType'] = 'Base';
    $previousData['brand'] = 'Adidas';
    $product = $sdk->createProduct($previousData);

    $operation = $manager->update($product, $previous);

    $feedback('Atualizado Totalmente Product /products/'.$id);
}
