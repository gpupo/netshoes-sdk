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

namespace Gpupo\NetshoesSdk\Entity\Templates;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getCode()    Acesso a code
 * @method setCode(string $code)    Define code
 * @method string getName()    Acesso a name
 * @method setName(string $name)    Define name
 * @method string getExternalCode()    Acesso a externalCode
 * @method setExternalCode(string $externalCode)    Define externalCode
 */
final class Item extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'code';

    public function getSchema()
    {
        return [
            'code'         => 'string',
            'name'         => 'string',
            'externalCode' => 'string',
        ];
    }
}
