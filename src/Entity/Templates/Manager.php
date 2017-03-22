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

use Gpupo\CommonSdk\Traits\PoolTrait;
use Gpupo\NetshoesSdk\Entity\AbstractManager;

final class Manager extends AbstractManager
{
    use PoolTrait;

    protected $entity = 'Templates';

    /**
     * @codeCoverageIgnore
     * @SuppressWarnings(PHPMD.cpd)
     */
    public $maps = [
        'brands'       => ['GET', '/brands'],
        'flavors'      => ['GET', '/flavors'],
        'colors'       => ['GET', '/colors'],
        'sizes'        => ['GET', '/sizes'],
        'departments'  => ['GET', '/bus/{buId}/departments'],
        'productTypes' => ['GET', '/department/{departmentCode}/productType'],
        'attributes'   => ['GET', '/department/{departmentCode}/productType/{productTypeCode}/templates'],
    ];
}
