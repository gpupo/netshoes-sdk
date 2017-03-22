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

namespace Gpupo\NetshoesSdk\Entity\Order\Shippings;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\NetshoesSdk\Traits\DateTimeTrait;

/**
 * @method string getCarrier()    Acesso a carrier
 * @method setCarrier(string $carrier)    Define carrier
 * @method setDeliveryDate(string $deliveryDate)    Define deliveryDate
 * @method string getDeliveryService()    Acesso a deliveryService
 * @method setDeliveryService(string $deliveryService)    Define deliveryService
 * @method setShipDate(string $shipDate)    Define shipDate
 * @method string getTrackingLink()    Acesso a trackingLink
 * @method setTrackingLink(string $trackingLink)    Define trackingLink
 * @method string getTrackingNumber()    Acesso a trackingNumber
 * @method setTrackingNumber(string $trackingNumber)    Define trackingNumber
 * @method setTrackingShipDate(string $trackingShipDate)    Define trackingShipDate
 */
class Transport extends EntityAbstract implements EntityInterface
{
    use DateTimeTrait;

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'carrier'               => 'string',
            'deliveryDate'          => 'datetime',
            'estimatedDeliveryDate' => 'datetime',
            'deliveryService'       => 'string',
            'shipDate'              => 'datetime',
            'trackingLink'          => 'string',
            'trackingNumber'        => 'string',
            'trackingShipDate'      => 'datetime',
        ];
    }

    public function getDeliveryDate()
    {
        return $this->dateGet('deliveryDate');
    }

    public function getEstimatedDeliveryDate()
    {
        return $this->dateGet('estimatedDeliveryDate');
    }

    public function getShipDate()
    {
        return $this->dateGet('shipDate');
    }

    public function getTrackingShipDate()
    {
        return $this->dateGet('trackingShipDate');
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
