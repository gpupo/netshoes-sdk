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

namespace Gpupo\NetshoesSdk;

use Gpupo\CommonSdk\FactoryAbstract;
use Gpupo\NetshoesSdk\Client\Client;

/**
 * Construtor principal, extendido pelo Factory de MarkethubBundle.
 */
class Factory extends FactoryAbstract
{
    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return  '\\'.__NAMESPACE__.'\Entity\\';
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
            'order' => [
                'class'   => $namespace.'Order\Order',
                'manager' => $namespace.'Order\Manager',
            ],
            'invoice' => [
                'class' => $namespace.'Order\Shippings\Invoice',
            ],
            'transport' => [
                'class' => $namespace.'Order\Shippings\Transport',
            ],
            'templates' => [
                'class'   => $namespace.'Templates\Templates',
                'manager' => $namespace.'Templates\Manager',
            ],
        ];
    }
}
