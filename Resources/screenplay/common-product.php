<?php

include 'common.php';
$implemented = true;
$manager = $sdk->factoryManager('product');

$makeSku = function ($id, $i, $size = "P") use ($centena) {
    return [
        "sku" => $id,
        "name"=> "SKU para homologação, tipo simples, Serie " . $centena . ' variação ' . $i ,
        "description"=> "SKU para homologação, descrição original",
        "gender"=> "Unissex",
        "eanIsbn"=> $centena . "112" . $id,
        "size"=> $size,
        "images"=> [
            ["url"=> "http://static.sepha.com.br/prd/14000/14080/14080_3_lst_30.jpg"]
        ],
        "height"=> "10.0",
        "width"=> "10.0",
        "depth"=> "10.0",
        "weight"=> 0.3,
        "color"=> "Incolor",
    ];
};

$attributes = [
    'default' =>[
        ["name"=>"Cores", "value"=>"Rosa"],
        ["name"=>"Genero", "value"=>"female"],
        ["name"=>"Sexo", "value"=>"F"],
    ],
    'modify' =>[
        ["name"=>"Cores", "value"=>"Azul"],
        ["name"=>"Genero", "value"=>"male"],
        ["name"=>"Sexo", "value"=>"M"],
    ],
];

$makeProduct = function ($id, $i, $mode = 'simple', $attributesMode = 'defalt') use ($centena, $makeSku, $attributes) {

    if ('simple' === $mode) {
        $skus = [
            $makeSku($id, $i),
        ];
    } elseif ('multiple' === $mode) {
        $skus = [
            $makeSku($id.'1', $i . '01', 'PP'),
            $makeSku($id.'2', $i . '02', "M"),
            $makeSku($id.'3', $i . '03', "G"),
            $makeSku($id.'4', $i . '04', "GG"),
        ];
    }

    return [
        'productId'   => $id,
        'skus'        => $skus,
        'department'  => 'Feminino',
        'productType' => 'BCAA',
        'brand'       => 'Nike',
        'attributes'  => $attributes[$attributesMode],
    ];
};
