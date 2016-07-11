<?php
//Atualizar três produtos cadastrados. As atualizações devem mudar o produto por completo exceto ID e SKU
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

    $output->writeln('Atualizado Totalmente Product /products/' . $id);
}
