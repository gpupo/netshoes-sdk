<?php
include 'common.php';

if ($dev) {
   return $pronto();
}

$responseList = $manager->fetchByRoute('brands', 0, 50);

$feedback('Concluído');
