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

class Sender extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'sellerCode';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
              'sellerCode'   => 'integer',
              'sellerName'   => 'string',
              'supplierCnpj' => 'string',
              'supplierName' => 'string',
        ];
    }
}
