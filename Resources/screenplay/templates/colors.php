<?php
include 'common.php';

if ($dev) {
   return $pronto();
}

$responseList = $manager->fetchByRoute('colors', 0, 50);

$feedback('Concluído');
