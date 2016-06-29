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

namespace Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address getAddress()    Acesso a address
 * @method setAddress(Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer\Address $address)    Define address
 * @method string getCellPhone()    Acesso a cellPhone
 * @method setCellPhone(string $cellPhone)    Define cellPhone
 * @method string getCustomerName()    Acesso a customerName
 * @method setCustomerName(string $customerName)    Define customerName
 * @method string getDocument()    Acesso a document
 * @method setDocument(string $document)    Define document
 * @method string getLandLine()    Acesso a landLine
 * @method setLandLine(string $landLine)    Define landLine
 * @method string getRecipientName()    Acesso a recipientName
 * @method setRecipientName(string $recipientName)    Define recipientName
 * @method string getStateInscription()    Acesso a stateInscription
 * @method setStateInscription(string $stateInscription)    Define stateInscription
 * @method string getTradeName()    Acesso a tradeName
 * @method setTradeName(string $tradeName)    Define tradeName
 */
class Customer extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'document';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
              'address'          => 'object',
              'cellPhone'        => 'string',
              'customerName'     => 'string',
              'document'         => 'string',
              'landLine'         => 'string',
              'recipientName'    => 'string',
              'stateInscription' => 'string',
              'tradeName'        => 'string',
      ];
    }
}
