<?php

//Atualizar parcialmente no mínimo quatro produtos criados.
//As alterações devem incluir department, productType e attributes

include 'common-product.php';

$war('Atualizar Product, Atributos');

if ($dev) { return $pronto(); }

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;
    $data = $makeProduct($id, $i);

    $data['department'] = 'Beleza';
    $data['productType'] = 'Base';

    $product = $sdk->createProduct($data);
    $operation = $manager->update($product);

    $output->writeln('Atualizado parcialmente Product /products/' . $id . '/skus' . $id);
}
