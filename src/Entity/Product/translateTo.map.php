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
