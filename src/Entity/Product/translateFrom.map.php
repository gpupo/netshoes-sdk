<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

$skusList = [];

foreach ($foreign['skus'] as $sku) {
    $skusList[] = [
            'sku'         => $sku['skuId'],
            'eanIsbn'     => $sku['gtin'],
            'name'        => $sku['name'],
            'description' => $sku['description'],
            'color'       => $sku['color'],
            'size'        => $sku['size'],
            'gender'      => $sku['gender'],
            'height'      => $sku['height'],
            'width'       => $sku['width'],
            'depth'       => $sku['depth'],
            'weight'      => $sku['weight'],
            'listPrice'   => $sku['listPrice'],
            'sellPrice'   => $sku['sellPrice'],
            'stock'       => $sku['stock'],
            'status'      => $sku['stock'],
        ];
}

return [
     'productId'   => $foreign['productId'],
     'department'  => $foreign['department'],
     'productType' => $foreign['productType'],
     'brand'       => $foreign['brand'],
     'skus'        => $skusList,
 ];
