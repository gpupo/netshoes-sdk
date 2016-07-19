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

namespace Gpupo\NetshoesSdk\Entity\Order\Shippings\Items;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getBrand()    Acesso a brand
 * @method setBrand(string $brand)    Define brand
 * @method string getColor()    Acesso a color
 * @method setColor(string $color)    Define color
 * @method int getDepartmentCode()    Acesso a departmentCode
 * @method setDepartmentCode(integer $departmentCode)    Define departmentCode
 * @method string getDepartmentName()    Acesso a departmentName
 * @method setDepartmentName(string $departmentName)    Define departmentName
 * @method float getDiscountUnitValue()    Acesso a discountUnitValue
 * @method setDiscountUnitValue(float $discountUnitValue)    Define discountUnitValue
 * @method string getEan()    Acesso a ean
 * @method setEan(string $ean)    Define ean
 * @method string getFlavor()    Acesso a flavor
 * @method setFlavor(string $flavor)    Define flavor
 * @method float getGrossUnitValue()    Acesso a grossUnitValue
 * @method setGrossUnitValue(float $grossUnitValue)    Define grossUnitValue
 * @method int getItemId()    Acesso a itemId
 * @method setItemId(integer $itemId)    Define itemId
 * @method string getManufacturerCode()    Acesso a manufacturerCode
 * @method setManufacturerCode(string $manufacturerCode)    Define manufacturerCode
 * @method string getName()    Acesso a name
 * @method setName(string $name)    Define name
 * @method float getNetUnitValue()    Acesso a netUnitValue
 * @method setNetUnitValue(float $netUnitValue)    Define netUnitValue
 * @method float getQuantity()    Acesso a quantity
 * @method setQuantity(float $quantity)    Define quantity
 * @method string getSize()    Acesso a size
 * @method setSize(string $size)    Define size
 * @method string getSku()    Acesso a sku
 * @method setSku(string $sku)    Define sku
 * @method string getStatus()    Acesso a status
 * @method setStatus(string $status)    Define status
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
 * @method string getCheckInData()    Acesso a checkInData
 * @method setCheckInData(string $checkInData)    Define checkInData
 * @method string getDevolutionData()    Acesso a devolutionData
 * @method setDevolutionData(string $devolutionData)    Define devolutionData
 * @method string getDevolutionExchangeStatus()    Acesso a devolutionExchangeStatus
 * @method setDevolutionExchangeStatus(string $devolutionExchangeStatus)    Define devolutionExchangeStatus
 * @method int getExchangeProcessCode()    Acesso a exchangeProcessCode
 * @method setExchangeProcessCode(integer $exchangeProcessCode)    Define exchangeProcessCode
 */
class Item extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = '';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'brand'                    => 'string',
            'color'                    => 'string',
            'departmentCode'           => 'integer',
            'departmentName'           => 'string',
            'discountUnitValue'        => 'number',
            'ean'                      => 'string',
            'flavor'                   => 'string',
            'grossUnitValue'           => 'number',
            'itemId'                   => 'integer',
            'manufacturerCode'         => 'string',
            'name'                     => 'string',
            'netUnitValue'             => 'number',
            'quantity'                 => 'number',
            'size'                     => 'string',
            'sku'                      => 'string',
            'status'                   => 'string',
            'totalCommission'          => 'number',
            'totalDiscount'            => 'number',
            'totalFreight'             => 'number',
            'totalGross'               => 'number',
            'totalNet'                 => 'number',
            'checkInData'              => 'string',
            'devolutionData'           => 'string',
            'devolutionExchangeStatus' => 'string',
            'exchangeProcessCode'      => 'integer',
        ];
    }

    public function toLog()
    {
        return $this->partitionByArrayKey([
            'sku',
            'ean',
            'name',
            'quantity',
        ]);
    }

    public function toSchema()
    {
        $array = [
            'itemOffered' => [
                'name'  => $this->getName(),
                'sku'   => $this->getSku(),
                'url'   => '',
                'image' => '',
            ],
            'price'            => $this->getTotalNet(),
            'priceCurrency'    => 'BRL',
            'eligibleQuantity' => [
                'value' => $this->getQuantity(),
            ],
            'seller' => [
                'name' => 'string',
            ],
        ];

        return $array;
    }
}
