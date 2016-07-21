<?php

$skusList = [];

foreach ($native->getSkus() as $sku) {
    $skusList[] = [
        'skuId'       => $sku->getId(),
        'gtin'        => $sku->getEanIsbn(),
        'name'        => $sku->getName(),
        'description' => $sku->getDescription(),
        'color'       => $sku->getColor(),
        'size'        => $sku->getSize(),
        'gender'      => $sku->getGender(),
        'height'      => $sku->getHeight(),
        'width'       => $sku->getWidth(),
        'depth'       => $sku->getDepth(),
        'weight'      => $sku->getWeight(),
        'listPrice'   => $sku->getPrice()->getPrice(),
        'sellPrice'   => $sku->getPriceSchedule()->getPriceTo(),
        'stock'       => $sku->getStock()->getAvailable(),
        'status'      => $sku->getStatus(),
    ];
}

return [
     'productId'   => $native->getId(),
     'productType' => $native->getProductType(),
     'department'  => $native->getDepartment(),
     'category'    => '',
     'brand'       => $native->getBrand(),
     'skus'        => $skusList,
 ];
