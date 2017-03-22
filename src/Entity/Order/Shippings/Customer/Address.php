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

namespace Gpupo\NetshoesSdk\Entity\Order\Shippings\Customer;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getCity()    Acesso a city
 * @method setCity(string $city)    Define city
 * @method string getComplement()    Acesso a complement
 * @method setComplement(string $complement)    Define complement
 * @method string getNeighborhood()    Acesso a neighborhood
 * @method setNeighborhood(string $neighborhood)    Define neighborhood
 * @method string getNumber()    Acesso a number
 * @method setNumber(string $number)    Define number
 * @method string getPostalCode()    Acesso a postalCode
 * @method setPostalCode(string $postalCode)    Define postalCode
 * @method string getReference()    Acesso a reference
 * @method setReference(string $reference)    Define reference
 * @method string getState()    Acesso a state
 * @method setState(string $state)    Define state
 * @method string getStreet()    Acesso a street
 * @method setStreet(string $street)    Define street
 */
class Address extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
              'city'         => 'string',
              'complement'   => 'string',
              'neighborhood' => 'string',
              'number'       => 'string',
              'postalCode'   => 'string',
              'reference'    => 'string',
              'state'        => 'string',
              'street'       => 'string',
        ];
    }

    /**
     * Entrega array compatível com Schema Comum.
     *
     * @see https://github.com/gpupo/common-schema/tree/master/src/Trading
     */
    public function toSchema()
    {
        return [
            'streetAddress'       => $this->getStreet(),
            'addressLocality'     => $this->getCity(),
            'addressRegion'       => $this->getState(),
            'addressCountry'      => 'BR',
            'postalCode'          => $this->getPostalCode(),
            'addressComplement'   => $this->getComplement(),
            'addressNumber'       => $this->getNumber(),
            'addressNeighborhood' => $this->getNeighborhood(),
            'addressReference'    => $this->getReference(),
        ];
    }
}
