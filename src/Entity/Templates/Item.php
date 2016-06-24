<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
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
class Item extends EntityAbstract implements EntityInterface
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
