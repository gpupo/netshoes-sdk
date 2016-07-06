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

namespace Gpupo\NetshoesSdk\Entity\Order\Shippings;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method int getShippingCode()    Acesso a shippingCode
 * @method setShippingCode(integer $shippingCode)    Define shippingCode
 * @method Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer getCustomer()    Acesso a customer
 * @method setCustomer(Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Customer $customer)    Define customer
 * @method float getFreightAmount()    Acesso a freightAmount
 * @method setFreightAmount(float $freightAmount)    Define freightAmount
 * @method Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice getInvoice()    Acesso a invoice
 * @method setInvoice(Gpupo\NetshoesSdk\Entity\Order\Shippings\Invoice $invoice)    Define invoice
 * @method Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Items getItems()    Acesso a items
 * @method setItems(Gpupo\NetshoesSdk\Entity\Order\Shippings\Items\Items $items)    Define items
 * @method Gpupo\NetshoesSdk\Entity\Order\Shippings\Sender getSender()    Acesso a sender
 * @method setSender(Gpupo\NetshoesSdk\Entity\Order\Shippings\Sender $sender)    Define sender
 * @method string getStatus()    Acesso a status
 * @method setStatus(string $status)    Define status
 * @method Gpupo\NetshoesSdk\Entity\Order\Shippings\Transport getTransport()    Acesso a transport
 * @method setTransport(Gpupo\NetshoesSdk\Entity\Order\Shippings\Transport $transport)    Define transport
 * @method string getCountry()    Acesso a country
 * @method setCountry(string $country)    Define country
 * @method string getCancellationReason()    Acesso a cancellationReason
 * @method setCancellationReason(string $cancellationReason)    Define cancellationReason
 * @method DevolutionItems getDevolutionItems()    Acesso a devolutionItems
 * @method setDevolutionItems(DevolutionItems $devolutionItems)    Define devolutionItems
 */
class Shipping extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'shippingCode';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
          'shippingCode'       => 'integer',
          'customer'           => 'object',
          'freightAmount'      => 'number',
          'invoice'            => 'object',
          'items'              => 'object',
          'sender'             => 'object',
          'status'             => 'string',
          'transport'          => 'object',
          'country'            => 'string',
          'cancellationReason' => 'string',
          'devolutionItems'    => 'object',
        ];
    }

    public function toLog()
    {
        return $this->partitionByArrayKey([
            'shippingCode',
            'status',
            'cancellationReason',
        ]);
    }
}
