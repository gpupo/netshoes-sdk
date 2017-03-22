<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://www.gpupo.com/>.
 */

$skusList = [];

$a = function ($key, $array) {
    if (array_key_exists($key, (array) $array)) {
        return $array[$key];
    }
};

foreach ((array) $foreign->get('skus') as $sku) {
    $f = function ($key) use ($a, $sku) {
        return $a($key, $sku);
    };
    $skusList[] = [
            'sku'         => $f('skuId'),
            'eanIsbn'     => $f('gtin'),
            'name'        => $f('name'),
            'description' => $f('description'),
            'color'       => $f('color'),
            'size'        => $f('size'),
            'gender'      => $f('gender'),
            'height'      => $f('height'),
            'width'       => $f('width'),
            'depth'       => $f('depth'),
            'weight'      => $f('weight'),
            'listPrice'   => $f('listPrice'),
            'sellPrice'   => $f('sellPrice'),
            'stock'       => $f('stock'),
            'status'      => $f('status'),
            'video'       => $f('video'),
            'images'      => $f('images'),
        ];
}

$array = [
     'productId'   => $foreign->get('productId'),
     'department'  => $foreign->get('department'),
     'productType' => $foreign->get('productType'),
     'brand'       => $foreign->get('brand'),
     'skus'        => $skusList,
];

return $array;
