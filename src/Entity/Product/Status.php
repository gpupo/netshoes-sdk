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

namespace Gpupo\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Exception\RuntimeException;

final class Status extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'active'          => 'boolean',
            'skuSynchronized' => 'boolean',
            'statusMatch'     => 'string',
            'hasPrice'        => 'boolean',
            'hasStock'        => 'boolean',
        ];
    }

    public function getMessage()
    {
        $statusMatch = $this->get('statusMatch');

        if (empty($statusMatch)) {
            throw new RuntimeException('Product Not Found', 404);
        }

        return $statusMatch;
    }

    public function isPending()
    {
        return 'PROCESSADO_INTEGRACAO_CATALOGO' !== $this->getMessage();
    }

    public function toLog()
    {
        $array = [
            'message' => $this->getMessage(),
        ];

        foreach (['getActive', 'getHasPrice', 'getHasStock', 'isPending'] as $k) {
            $array[$k] = (true === $this->$k()) ? 'yes' : 'no';
        }

        return $array;
    }
}
