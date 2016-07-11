<?php

include 'common-product.php';

if ($dev) { return $pronto(); }

foreach ([41, 42, 43, 44] as $i) {
    $id = $centena + $i;
    $data = $makeProduct($id, $i, 'multiple');

    $product = $sdk->createProduct($data);
    $operation = $manager->save($product);

    if (202 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Cadastro Product #' . $id);
    }

    foreach ($data['skus'] as $s) {
        $output->writeln('Cadastrado Product /products/' . $id . '/skus/' . $s['sku']);
    }
}
