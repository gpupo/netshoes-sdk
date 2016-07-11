<?php
include 'common.php';

if ($dev) {
   return $pronto();
}

$responseList = $manager->fetchByRoute('flavors', 0, 50);

$feedback('Concluído');
