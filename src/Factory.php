<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk;

use Gpupo\CommonSdk\FactoryAbstract;
use Gpupo\NetshoesSdk\Client\Client;

class Factory extends FactoryAbstract
{
    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return '\Gpupo\NetshoesSdk\Entity\\';
    }

    protected function getSchema($namespace = null)
    {
        return [
            'product' => [
                'class'   => $namespace.'Product\Product',
                'manager' => $namespace.'Product\Manager',
            ],
            'sku' => [
                'class'   => $namespace.'Product\Sku\Item',
                'manager' => $namespace.'Product\Sku\Manager',
            ],
            'templates' => [
                'class'   => $namespace.'Templates\Templates',
                'manager' => $namespace.'Templates\Manager',
            ],
        ];
    }
}
