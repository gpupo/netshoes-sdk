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

$responseList = $manager->fetchByRoute('productTypes', 0, 50, [
    'departmentCode'  => 9,
    'productTypeCode' => 11,
]);

$feedback('Concluído');
