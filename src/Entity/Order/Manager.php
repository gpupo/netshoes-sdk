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

namespace Gpupo\NetshoesSdk\Entity\Order;

use Gpupo\NetshoesSdk\Entity\AbstractManager;

class Manager extends AbstractManager
{
    protected $entity = 'Order';

    /**
     * @codeCoverageIgnore
     */
    protected $maps = [
        'fetch'                 => ['GET', '/orders?page={offset}&size={limit}'], // Get a list of Orders.
        'findById'              => ['GET', '/orders/{orderNumber}'], // Get a order based on order number.
        'fetchShippings'        => ['GET', '/orders/{orderNumber}/shippings'], // Get a list of shippings by order number.
        'findShippingById'      => ['GET', '/orders/{orderNumber}/shippings/{shippingCode}'], // Get a shipping based on order number and shipping code.
        'saveStatus'            => ['PUT', '/orders/{orderNumber}/shippings/{shippingCode}/status/approved'], // Update the shipping status to Approved.
        'saveStatusToCanceled'  => ['PUT', '/orders/{orderNumber}/shippings/{shippingCode}/status/canceled'], // Update the shipping status to Canceled.
        'saveStatusToDelivered' => ['PUT', '/orders/{orderNumber}/shippings/{shippingCode}/status/delivered'], // Update the shipping status to Delivered.
        'saveStatusToInvoiced'  => ['PUT', '/orders/{orderNumber}/shippings/{shippingCode}/status/invoiced'], // Update the shipping status to Invoiced.
        'saveStatusToShipped'   => ['PUT', '/orders/{orderNumber}/shippings/{shippingCode}/status/shipped'], // Update the shipping status to Shipped
    ];
}
