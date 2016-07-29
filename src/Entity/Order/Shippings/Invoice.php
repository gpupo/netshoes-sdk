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
use Gpupo\NetshoesSdk\Traits\DateTimeTrait;

/**
 * @method string getNumber()    Acesso a number
 * @method setNumber(string $number)    Define number
 * @method int getLine()    Acesso a line
 * @method setLine(integer $line)    Define line
 * @method string getAccessKey()    Acesso a accessKey
 * @method setAccessKey(string $accessKey)    Define accessKey
 * @method string getShipDate()    Acesso a shipDate
 * @method setShipDate(string $shipDate)    Define shipDate
 * @method string getUrl()    Acesso a url
 * @method setUrl(string $url)    Define url
 */
class Invoice extends EntityAbstract implements EntityInterface
{
    use DateTimeTrait;

    protected $primaryKey = 'number';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'number'    => 'string',
            'line'      => 'integer',
            'accessKey' => 'string',
            'issueDate' => 'string',
            'shipDate'  => 'string',
            'url'       => 'string',
        ];
    }

    public function check()
    {
        $this->setRequiredSchema(['number', 'line', 'accessKey', 'issueDate']);
        $this->setOptionalSchema(['shipDate', 'url']);

        return $this->isValid();
    }

    public function getIssueDate()
    {
        return $this->dateGet('issueDate');
    }

}
