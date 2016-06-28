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

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getAgreedDate()    Acesso a agreedDate
 * @method setAgreedDate(string $agreedDate)    Define agreedDate
 * @method string getBusinessUnit()    Acesso a businessUnit
 * @method setBusinessUnit(string $businessUnit)    Define businessUnit
 * @method bool getDevolutionRequested()    Acesso a devolutionRequested
 * @method setDevolutionRequested(boolean $devolutionRequested)    Define devolutionRequested
 * @method bool getExchangeRequested()    Acesso a exchangeRequested
 * @method setExchangeRequested(boolean $exchangeRequested)    Define exchangeRequested
 * @method string getOrderDate()    Acesso a orderDate
 * @method setOrderDate(string $orderDate)    Define orderDate
 * @method string getOrderNumber()    Acesso a orderNumber
 * @method setOrderNumber(string $orderNumber)    Define orderNumber
 * @method string getOrderStatus()    Acesso a orderStatus
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
class Order extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'orderNumber';

    public function getSchema()
    {
        return [
            'agreedDate'          => 'string',
            'businessUnit'        => 'string',
            'devolutionRequested' => 'boolean',
            'exchangeRequested'   => 'boolean',
            'orderDate'           => 'string',
            'orderNumber'         => 'string',
            'orderStatus'         => 'string',
            'orderType'           => 'string',
            'originNumber'        => 'string',
            'originSite'          => 'string',
            'paymentDate'         => 'string',
            'shippings'           => 'object',
            'totalCommission'     => 'number',
            'totalDiscount'       => 'number',
            'totalFreight'        => 'number',
            'totalGross'          => 'number',
            'totalNet'            => 'number',
            'totalQuantity'       => 'number',
        ];
    }
}
