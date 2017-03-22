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

return [
     'merchant' => [
         'name'         => $native->getOriginSite(),
         'marketplace'  => 'NETSHOES',
         'originNumber' => $native->getOriginNumber(),
     ],
     'orderNumber'    => $native->getId(),
     'acceptedOffer'  => $native->getItems()->toSchema(),
     'orderStatus'    => $native->getOrderStatus(),
     'orderDate'      => $native->getOrderDate(),
     'customer'       => $native->getShipping()->getCustomer()->toSchema(),
     'billingAddress' => $native->getShipping()->getCustomer()->getAddress()->toSchema(),
     'currency'       => 'BRL',
     'price'          => $native->getTotalNet(),
     'discount'       => $native->getTotalDiscount(),
     'quantity'       => $native->getTotalQuantity(),
     'freight'        => $native->getTotalFreight(),
     'total'          => $native->getTotalGross(),
 ];
