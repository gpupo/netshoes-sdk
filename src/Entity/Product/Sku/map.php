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

/**
  * @SuppressWarnings(PHPMD.cpd)
  */
 return [
     'save'              => ['POST', '/products/{productId}/skus'], //Create a new sku for a product
     'findSkuById'       => ['GET', '/products/{productId}/skus/{itemId}'], // Get the a sku by product Id and sku Id
     'update'            => ['PUT', '/products/{productId}/skus/{itemId}'], //Update a product based on SKU
     'findById'          => ['GET', '/products/{itemId}/skus'], //Get the list of product skus
     'saveStatus'        => ['PUT', '/skus/{sku}/bus/{buId}/status'], //Enable or disable sku for sale
     'savePriceSchedule' => ['POST', '/skus/{sku}/priceSchedules'], //Save a price schedule
     'getPriceSchedule'  => ['GET', '/skus/{sku}/priceSchedules'], //Get PriceSchedule
     'getPrice'          => ['GET', '/skus/{sku}/prices'], //Get a base price
     'savePrice'         => ['PUT', '/skus/{sku}/prices'], //Save a base price
     'saveStock'         => ['PUT', '/skus/{sku}/stocks'], //Update stock quantity by sku
     'getStock'          => ['GET', '/skus/{sku}/stocks'], //Get Stock
     'saveStatus'        => ['GET', '/skus/{sku}/bus/{buId}/status'], //Save Status
     'getStatus'         => ['GET', '/skus/{sku}/bus/{buId}/status'], //Get Status
 ];
