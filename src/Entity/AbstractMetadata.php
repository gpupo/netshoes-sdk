<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
