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
 * @method string getCarrier()    Acesso a carrier
 * @method setCarrier(string $carrier)    Define carrier
 * @method string getDeliveryDate()    Acesso a deliveryDate
 * @method setDeliveryDate(string $deliveryDate)    Define deliveryDate
 * @method string getDeliveryService()    Acesso a deliveryService
 * @method setDeliveryService(string $deliveryService)    Define deliveryService
 * @method string getShipDate()    Acesso a shipDate
 * @method setShipDate(string $shipDate)    Define shipDate
 * @method string getTrackingLink()    Acesso a trackingLink
 * @method setTrackingLink(string $trackingLink)    Define trackingLink
 * @method string getTrackingNumber()    Acesso a trackingNumber
 * @method setTrackingNumber(string $trackingNumber)    Define trackingNumber
 * @method string getTrackingShipDate()    Acesso a trackingShipDate
 * @method setTrackingShipDate(string $trackingShipDate)    Define trackingShipDate
 */
class Transport extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'carrier'               => 'string',
            'deliveryDate'          => 'string',
            'estimatedDeliveryDate' => 'string',
            'deliveryService'       => 'string',
            'shipDate'              => 'string',
            'trackingLink'          => 'string',
            'trackingNumber'        => 'string',
            'trackingShipDate'      => 'string',
        ];
    }

    public function check($status = null)
    {
        $list = ['deliveryDate'];

        if ('shipped' === $status) {
            $list = ['carrier', 'trackingNumber', 'deliveredDate', 'estimatedDelivery'];
        }

        $this->setRequiredSchema($list);

        return $this->validate();
    }
}
