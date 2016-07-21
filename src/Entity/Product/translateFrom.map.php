<?php

$skusList = [];

foreach ($foreign['skus'] as $sku) {
    $skusList[] = [
            'sku'       => $sku['skuId'],
            'eanIsbn'   => $sku['gtin'],
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
     "department"=> $foreign['department'],
     "productType"=> $foreign['productType'],
     "brand"=> $foreign['brand'],
     'skus' => $skusList,
 ];
