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

$responseList = $manager->fetchByRoute('productTypes', 0, 50, [
    'departmentCode' => 9,
]);

$feedback('Concluído');
//'productTypeCode

