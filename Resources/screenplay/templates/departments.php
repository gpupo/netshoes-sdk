<?php
include 'common.php';

if ($dev) {
    return $pronto();
}

$responseList = $manager->fetchByRoute('departments', 0, 50);

$feedback('Concluído');
