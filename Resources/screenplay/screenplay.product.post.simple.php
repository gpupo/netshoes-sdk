<?php

include 'common-product.php';

if ($dev) { return $pronto(); }

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;
    $data = $makeProduct($id, $i);
    $product = $sdk->createProduct($data);
    $operation = $manager->save($product);

    if (202 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Cadastro Product #' . $id);
    }

    $output->writeln('Cadastrado Product /products/' . $id . '/skus' . $id);
}
