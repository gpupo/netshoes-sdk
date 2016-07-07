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

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

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
class PriceSchedule extends EntityAbstract implements EntityInterface
{
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
        $this->setOptionalSchema(['priceFrom', 'dateInit', 'dateEnd']);
    }

    /**
     * @todo Melhorar datas início e fim da promoção que estão fixas
     */
    public function toArray()
    {
        $array = array_merge(parent::toArray(), [
            'dateInit' => '2016-01-01T00:00:01.000Z',
            'dateEnd'  => '2018-01-01T00:00:01.000Z',
        ]);

        return $array;
    }
}
