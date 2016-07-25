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

namespace Gpupo\NetshoesSdk\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
class DetailCommand extends AbstractCommand
{
    public function main($app)
    {
        $opts = [
            ['key' => 'file'],
            [
                'key'     => 'type',
                'options' => ['Price', 'PriceSchedule', 'Stock', 'Status'],
                'default' => 'Price',
            ],
        ];

        $this->getApp()->appendCommand('product:sku:detail:update', 'Atualiza detalhes de um SKU', $opts)
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts) {
                $list = $app->processInputParameters($opts, $input, $output);

                $data = $app->jsonLoadFromFile($list['file']);
                $sdk = $app->factorySdk($list);
                $sku = $sdk->createSku($data);

                try {
                    $type = ucfirst($list['type']);
                    $operation = $sdk->factoryManager('sku')->saveDetail($sku, $type);

                    if (in_array($operation->getHttpStatusCode(), [200, 201], true)) {
                        $output->writeln('Atualizando <comment>'.$type.'</comment>');
                        $output->writeln('<info>Successo!</info>');
                    }
                } catch (\Exception $e) {
                    $app->showException($e, $output);
                }
            });
    }
}
