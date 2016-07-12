<?php

use Symfony\CS\Config\Config;
use Symfony\CS\FixerInterface;
use Symfony\CS\Finder\DefaultFinder;
use Symfony\CS\Fixer\Contrib\HeaderCommentFixer;

$header = <<<EOF
Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
see <http://www.g1mr.com/netshoes-sdk/>
@version 1
EOF;

HeaderCommentFixer::setHeader($header);

$finder = DefaultFinder::create()
    ->in(__DIR__);

return Config::create()
    ->fixers([
        'yoda_conditions',
        'align_double_arrow',
        'header_comment',
        'multiline_spaces_before_semicolon',
        'ordered_use',
        'phpdoc_order',
        'phpdoc_var_to_type',
        'strict',
        'strict_param',
        'short_array_syntax',
        'php_unit_strict',
        'php_unit_construct',
        'newline_after_open_tag',
        'ereg_to_preg',
        'short_echo_tag',
        'pre_increment',
    ])
    ->level(FixerInterface::SYMFONY_LEVEL)
    ->setUsingCache(false)
    ->finder($finder);
