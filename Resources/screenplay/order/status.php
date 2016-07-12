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

$list = ['approved', 'invoiced', 'shipped', 'delivered', 'canceled'];

$orders = [];
foreach (range(7, 20) as $i) {
    $orders[] = $centena.'010101'.$i;
}

foreach ($list as $status) {
    $output->writeln('Update the shipping status to ['.$status.']');

    $y = 0;
    while ($y <= 1) {
        $id = current($orders);
        $order = $createOrder($id);
        $order->setOrderStatus($status);
        $feedback('Movendo o pedido #'.$id.' para o status ['.$status.']');

        require __DIR__.'/status.'.$status.'.php';

        ++$y;
        next($orders);
    }
}
