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

namespace Gpupo\NetshoesSdk\Entity;

use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;

abstract class AbstractMetadata extends MetadataContainerAbstract
{
    protected function cutMetadata($raw)
    {
        return  $this->dataPiece('links', $raw);
    }

    protected function normalizeMetas($metas)
    {
        $data = [];

        if (is_array($metas)) {
            foreach ($metas as $meta) {
                $data[$meta['rel']] = str_replace('http://sandbox-catalogo-vs.netshoes.local/mp-catalogo-api/rs', '', $meta['href']);
            }
        }

        return $data;
    }
}
