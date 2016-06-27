<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Console\Command;

use Gpupo\NetshoesSdk\Console\Application;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SkuCommand
{
    public static function append(Application $app)
    {
        $app->appendCommand('product:sku:view', 'Mostra os SKUs de um Produto')
            ->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);

                $p = $app->factorySdk($list)->factoryManager('sku')->findById($input->getArgument('productId'));

                $app->displayTableResults($output, $p);
            });

        $insertOptions = [
            ['key' => 'file'],
        ];

        $app->appendCommand('product:sku:update', 'Atualiza um SKU')
            ->setDefinition($app->factoryDefinition($insertOptions))
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $insertOptions) {
                $list = $app->processInputParameters($insertOptions, $input, $output);

                $data = json_decode(file_get_contents($list['file']), true);
                $sdk = $app->factorySdk($list);
                $product = $sdk->createSku($data);

                try {
                    $operation = $sdk->factoryManager('sku')->save($product);

                    if (202 === $operation->getHttpStatusCode()) {
                        $output->writeln('<info>Successo!</info>');
                    }
                } catch (\Exception $e) {
                    $output->writeln('<error>Erro na criação</error>');
                    $output->writeln('Message: <comment>'.$e->getMessage().'</comment>');
                    $output->writeln('Code: <comment>'.$e->getCode().'</comment>');
                }
            });

        return $app;
    }
}
