<?php
include 'common.php';

if ($dev) {
    return $pronto();
}

$responseList = $manager->fetchByRoute('productTypes', 0, 50, [
    'departmentCode'  => 9,
    'productTypeCode'   => 11
]);

$feedback('Concluído');
