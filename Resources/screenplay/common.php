<?php

/*
 * Este arquivo faz parte do roteiro de execuções de gpupo/netshoes-sdk
 * see <https://opensource.gpupo.com/netshoes-sdk/>
 * @version 1
 */

$dev = false;
$centena = 3400;

$pronto = function () use ($output) {
    $output->writeln('<comment>Bypassed!</>');
};

$war = function ($message) use ($output) {
    $output->writeln('<options=bold> ====>  '.$message.'</>');
};

$makeSku = function ($id, $i, $size = 'P') use ($centena) {
    return [
        'sku'         => $id,
        'name'        => 'SKU para homologação, tipo simples, Serie '.$centena.' variação '.$i,
        'description' => 'SKU para homologação, descrição original',
        'gender'      => 'Unissex',
        'eanIsbn'     => $centena.'112'.$id,
        'size'        => $size,
        'images'      => [
            ['url' => 'http://static.sepha.com.br/prd/14000/14080/14080_3_lst_30.jpg'],
        ],
        'height' => '10.0',
        'width'  => '10.0',
        'depth'  => '10.0',
        'weight' => 0.3,
        'color'  => 'Incolor',
        'listPrice' => '100',
        'sellPrice' => '90',
        'stock' => '10',
        'status' => 'active',
    ];
};
$makeProduct = function ($id, $i, $mode = 'simple', $attributesMode = 'default') use ($centena, $makeSku) {

    $attributes = [
        'default' => [
            ['name' => 'Sexo', 'value' => 'F'],
        ],
        'modify' => [
            ['name' => 'Sexo', 'value' => 'M'],
        ],
    ];

    if ('simple' === $mode) {
        $skus = [
            $makeSku($id, $i),
        ];
    } elseif ('multiple' === $mode) {
        $skus = [
            $makeSku($id.'1', $i.'01', 'XG'),
            $makeSku($id.'2', $i.'02', 'M'),
            $makeSku($id.'3', $i.'03', 'G'),
            $makeSku($id.'4', $i.'04', 'GG'),
        ];
    }

    $array = [
        'productId'   => $id,
        'skus'        => $skus,
        'department'  => 'Feminino',
        'productType' => 'BCAA',
        'brand'       => 'Nike',
        'attributes'  => $attributes[$attributesMode],
    ];

    return $array;
};

$feedback = function ($string) use ($output) {
    return $output->writeln(date('d/m/Y H:i').' - '.$string);
};
