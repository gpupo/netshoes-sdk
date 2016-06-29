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

namespace Gpupo\NetshoesSdk\Console;

use Gpupo\CommonSdk\Console\AbstractApplication;
use Gpupo\NetshoesSdk\Factory;

class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key' => 'client_id',
        ],
        [
            'key' => 'access_token',
        ],
        [
            'key'     => 'env',
            'options' => ['sandbox', 'api'],
            'default' => 'sandbox',
            'name'    => 'Version',
        ],
        [
            'key'     => 'sslVersion',
            'options' => ['SecureTransport', 'TLS'],
            'default' => 'SecureTransport',
            'name'    => 'SSL Version',
        ],
        [
            'key'     => 'registerPath',
            'default' => false,
        ],
    ];

    /**
     * @codeCoverageIgnore
     */
    protected function getLogFilePath()
    {
        return 'var/logs/console.log';
    }

    public function factorySdk(array $options)
    {
        return  Factory::getInstance()->setup($options, $this->factoryLogger());
    }

    public function appendCommand($name, $description, array $definition = [])
    {
        return $this->register($name)
            ->setDescription($description)
            ->setDefinition($this->factoryDefinition($definition));
    }
}
