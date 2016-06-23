<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\NetshoesSdk\Entity\Templates;

use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;

class TemplatesCollection extends MetadataContainerAbstract
{
    protected function getKey()
    {
        return 'items';
    }

    protected function factoryEntity(array $data)
    {
        return new Item($data);
    }
}
