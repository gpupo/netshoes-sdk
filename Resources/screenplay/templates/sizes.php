<?php
include 'common.php';

if ($dev) {
    return $pronto();
}

$responseList = $manager->fetchByRoute('sizes', 0, 50);

$feedback('Concluído');
