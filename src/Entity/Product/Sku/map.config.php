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

$s = '/skus/{sku}';
$p = '/products/{itemId}/skus';

return [
    'save'              => ['POST', $p], //Create a new sku for a product
    'add'               => ['POST', '/products/{productId}/skus'], //Create a new sku for a product
    'fetch'             => ['GET', $p], // list of SKUs
    'findById'          => ['GET', $p.'/{itemId}'], // Get the a sku by product Id and sku Id
    'update'            => ['PUT', $p.'/{itemId}'], //Update a product based on SKU
    'saveStatus'        => ['PUT', $s.'/bus/{buId}/status'], //Enable or disable sku for sale
    'savePriceSchedule' => ['POST', $s.'/priceSchedules'], //Save a price schedule
    'getPriceSchedule'  => ['GET', $s.'/priceSchedules'], //Get PriceSchedule
    'getPrice'          => ['GET', $s.'/prices'], //Get a base price
    'savePrice'         => ['PUT', $s.'/prices'], //Save a base price
    'saveStock'         => ['PUT', $s.'/stocks'], //Update stock quantity by sku
    'getStock'          => ['GET', $s.'/stocks'], //Get Stock
    'getStatus'         => ['GET', $s.'/bus/{buId}/status'], //Get Status
];
