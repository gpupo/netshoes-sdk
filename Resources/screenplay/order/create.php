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

foreach (range(7, 20) as $i) {
    $id = $centena.'010101'.$i;
    $operation = $manager->save($createOrder($id));

    if (201 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: #'.$id);
    }

    $feedback('Pedido #'.$id.' criado ');
}
