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
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
class Application extends AbstractApplication
{
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<bg=green;options=bold>gpupo/netshoes-sdk</>');
        $output->writeln('<options=bold>'
        .'Atenção! Esta aplicação é apenas uma '
        .'ferramenta de apoio ao desenvolvedor e não deve ser usada no ambiente de produção!'
        ."\n"
        .'</>'
        ."\n");

        return parent::doRun($input, $output);
    }

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

    public function factorySdk(array $options, $loggerChannel = 'bin', $verbose = false)
    {
        return  Factory::getInstance()->setup($options, $this->factoryLogger($loggerChannel, $verbose));
    }

}
