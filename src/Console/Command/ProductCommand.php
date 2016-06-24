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
use Gpupo\CommonSdk\Exception\ClientException;
class ProductCommand
{
    public static function append(Application $app)
    {
        $app->appendCommand('product:view', 'Consulta a situação de um produto')
            ->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);

            $p = $app->factorySdk($list)->factoryManager('product')->findById($input->getArgument('productId'));

            $app->displayTableResults($output, [[
                'Id'           => $p->getProductId(),
                'Brand'        => $p->getBrand(),
                'Department'   => $p->getDepartment(),
                'Product Type' => $p->getProductType(),
            ]]);

            $output->writeln('<fg=yellow>Skus</>');

            $app->displayTableResults($output, $p->getSkus());

        });

        $insertOptions = [
            ['key'   => 'file'],
        ];

        $app->appendCommand('product:insert', 'Insere um produto a partir do Json de um arquivo')
            ->setDefinition($app->factoryDefinition($insertOptions))
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $insertOptions) {
                $list = $app->processInputParameters($insertOptions, $input, $output);

                $data = json_decode(file_get_contents($list['file']), true);
                $sdk = $app->factorySdk($list);
                $product = $sdk->createProduct($data);

                try {
                    $operation = $sdk->factoryManager('product')->save($product);

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
