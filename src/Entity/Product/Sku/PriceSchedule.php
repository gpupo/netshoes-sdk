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

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\NetshoesSdk\Traits\DateTimeTrait;

/**
 * @method float getPriceFrom()    Acesso a priceFrom
 * @method setPriceFrom(float $priceFrom)    Define priceFrom
 * @method float getPriceTo()    Acesso a priceTo
 * @method setPriceTo(float $priceTo)    Define priceTo
 * @method string getDateInit()    Acesso a dateInit
 * @method setDateInit(string $dateInit)    Define dateInit
 * @method string getDateEnd()    Acesso a dateEnd
 * @method setDateEnd(string $dateEnd)    Define dateEnd
 */
final class PriceSchedule extends EntityAbstract implements EntityInterface
{
    use DateTimeTrait;

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return  [
            'priceFrom' => 'number',
            'priceTo'   => 'number',
            'dateInit'  => 'string',
            'dateEnd'   => 'string',
        ];
    }

    protected function setUp()
    {
        $this->setOptionalSchema(['priceFrom', 'dateEnd']);
    }

    public function setDateInit($string)
    {
        return parent::setDateInit($this->dateFormat($string));
    }

    public function setDateEnd($string)
    {
        return parent::setDateEnd($this->dateFormat($string));
    }

    public function toArray()
    {
        if ($this->elementEmpty('dateInit')) {
            $this->setDateInit('');
        }

        if ($this->elementEmpty('dateEnd')) {
            $this->setDateEnd(date('Y-m-d', strtotime('+1 month', strtotime('NOW'))));
        }

        return parent::toArray();
    }
}
