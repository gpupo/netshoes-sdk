<?php
//Criação de no mínimo quatro novos Skus em produtos já existentes
include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24, 35, 36, 37, 38, 39] as $i) {
    $productId = $centena + $i;

    $id = $centena + ($i + 30);

    $data =  [
       "sku" => $id,
       "name"=> "SKU para homologação, tipo adicional, Serie " . $centena . ' variação ' . $i ,
       "description"=> "SKU para homologação, descrição original",
       "gender"=> "Unissex",
       "eanIsbn"=> $centena . "112" . $id,
       "size"=> 'Único',
       "images"=> [
           ["url"=> "http://static.sepha.com.br/prd/14000/14080/14080_3_lst_30.jpg"]
       ],
       "height"=> "10.0",
       "width"=> "10.0",
       "depth"=> "10.0",
       "weight"=> 0.3,
       "color"=> "Incolor",
   ];

    $sku = $sdk->createSku($data);
    $operation = $manager->add($sku, $productId);

    if (201 !== $operation->getHttpStatusCode()) {
        throw new \Exception('FAIL: Cadastro SKU #' . $id);
    }

    $feedback('Adicionado SKU /products/' . $productId . '/skus' . $id);
}
