<?php

//Atualizar três produtos cadastrados. As atualizações devem mudar o produto por completo exceto ID e SKU
include 'common-product.php';

$war('Atualizar Product, Atributos');

if ($dev) { return $pronto(); }

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;
    $previousData = $makeProduct($id, $i);
    $previous = $sdk->createProduct($previousData);
    $previousData['department'] = 'Beleza';
    $previousData['productType'] = 'Base';
    $previousData['brand'] = 'Adidas';
    $product = $sdk->createProduct($previousData);

    $operation = $manager->update($product, $previous);

    $output->writeln('Atualizado Totalmente Product /products/' . $id . '/skus');
}
