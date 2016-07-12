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

$responseList = $manager->fetchByRoute('departments', 0, 50);

$feedback('Concluído');
