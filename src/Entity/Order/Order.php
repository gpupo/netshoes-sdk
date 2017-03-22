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

namespace Gpupo\NetshoesSdk\Entity\Order;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Traits\LoadTrait;

/**
 * @method string getAgreedDate()    Acesso a agreedDate
 * @method setAgreedDate(string $agreedDate)    Define agreedDate
 * @method string getBusinessUnit()    Acesso a businessUnit
 * @method setBusinessUnit(string $businessUnit)    Define businessUnit
 * @method bool getDevolutionRequested()    Acesso a devolutionRequested
 * @method setDevolutionRequested(boolean $devolutionRequested)    Define devolutionRequested
 * @method bool getExchangeRequested()    Acesso a exchangeRequested
 * @method setExchangeRequested(boolean $exchangeRequested)    Define exchangeRequested
 * @method setOrderDate(string $orderDate)    Define orderDate
 * @method string getOrderNumber()    Acesso a orderNumber
 * @method setOrderNumber(string $orderNumber)    Define orderNumber
 * @method setOrderStatus(string $orderStatus)    Define orderStatus
 * @method string getOrderType()    Acesso a orderType
 * @method setOrderType(string $orderType)    Define orderType
 * @method string getOriginNumber()    Acesso a originNumber
 * @method setOriginNumber(string $originNumber)    Define originNumber
 * @method string getOriginSite()    Acesso a originSite
 * @method setOriginSite(string $originSite)    Define originSite
 * @method string getPaymentDate()    Acesso a paymentDate
 * @method setPaymentDate(string $paymentDate)    Define paymentDate
 * @method Gpupo\NetshoesSdk\Entity\Order\Shippings\Shippings getShippings()    Acesso a shippings
 * @method setShippings(Gpupo\NetshoesSdk\Entity\Order\Shippings\Shippings $shippings)    Define shippings
 * @method float getTotalCommission()    Acesso a totalCommission
 * @method setTotalCommission(float $totalCommission)    Define totalCommission
 * @method float getTotalDiscount()    Acesso a totalDiscount
 * @method setTotalDiscount(float $totalDiscount)    Define totalDiscount
 * @method float getTotalFreight()    Acesso a totalFreight
 * @method setTotalFreight(float $totalFreight)    Define totalFreight
 * @method float getTotalGross()    Acesso a totalGross
 * @method setTotalGross(float $totalGross)    Define totalGross
 * @method float getTotalNet()    Acesso a totalNet
 * @method setTotalNet(float $totalNet)    Define totalNet
 * @method float getTotalQuantity()    Acesso a totalQuantity
 * @method setTotalQuantity(float $totalQuantity)    Define totalQuantity
 */
final class Order extends EntityAbstract implements EntityInterface, CollectionInterface
{
    use LoadTrait;

    protected $primaryKey = 'orderNumber';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return $this->loadArrayFromFile(__DIR__.'/map/schema.map.php');
    }

    protected function setUp()
    {
        $this->setOptionalSchema(['devolutionRequested', 'exchangeRequested']);
    }

    public function toLog()
    {
        return $this->partitionByArrayKey([
            'orderDate',
            'orderNumber',
            'orderStatus',
            'orderType',
            'originNumber',
            'originSite',
            'paymentDate',
            'totalFreight',
            'totalNet',
            'totalQuantity',
        ]);
    }

    public function getShipping()
    {
        $shipping = $this->getShippings()->first();

        if (empty($shipping)) {
            throw new \Exception('Shipping Missed!');
        }

        return $shipping;
    }

    public function getOrderStatus()
    {
        $value = $this->get('orderStatus');

        return strtolower($value);
    }

    public function getInvoice()
    {
        return $this->getShipping()->getInvoice();
    }

    public function getItems()
    {
        return $this->getShipping()->getItems();
    }

    public function check()
    {
        $this->setRequiredSchema(['businessUnit', 'orderDate', 'orderNumber']);

        return $this->isValid();
    }

    public function getOrderDate()
    {
        $od = $this->get('orderDate');

        if (intval($od) === $od) {
            return date('Y-m-d', $od / 1000);
        }

        return $od;
    }
}
