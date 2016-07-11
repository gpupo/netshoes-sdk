<?php

$dev = true;
$centena = 4100;

$pronto = function() use ($output) {
    $output->writeln('<comment>Bypassed!</>');
};

$war = function($message) use ($output) {
    $output->writeln('<options=bold> ====>  '.$message.'</>');
};
