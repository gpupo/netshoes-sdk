<?php
//Atualizar no mínimo quatro Skus existentes
include 'common.php';

if ($dev) {
    return $pronto();
}

foreach ([21, 22, 23, 24] as $i) {
    $id = $centena + $i;

    $data =  [
       "sku" => $id,
       "name"=> "SKU para homologação, tipo adicional, Serie " . $centena . ' variação ' . $i . ' - modificado',
       "description"=> "SKU para homologação, descrição modificada",
       "gender"=> "Unissex",
       "eanIsbn"=> $centena . "112" . $id,
       "size"=> 'Único',
       "images"=> [
           ["url"=> "http://static.sepha.com.br/prd/14000/14080/14080_3_lst_30.jpg"]
       ],
       "height"=> "20.0",
       "width"=> "40.0",
       "depth"=> "20.0",
       "weight"=> 0.3,
       "color"=> "Incolor",
   ];

    $sku = $sdk->createSku($data);
    $operation = $manager->updateInfo($sku);

    if (200 !== $operation['code']['info']) {
        throw new \Exception('FAIL: Update info SKU #' . $id);
    }

    $feedback('Atualizado o SKU /products/' . $id . '/skus/' . $id);
}
