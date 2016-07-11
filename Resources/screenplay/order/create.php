<?php
//Criar pelo menos 12 pedidos com mais de um item
include 'common.php';

if ($dev) {
   return $pronto();
}

foreach (range(7, 20) as $i) {
    $id = $centena . '010101' .  $i;
    $operation = $manager->save($createOrder($id));

    if (201 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: #' . $id);
    }

    $feedback("Pedido #". $id." criado ");
}
