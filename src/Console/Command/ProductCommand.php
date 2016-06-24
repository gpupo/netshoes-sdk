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

        return $app;
    }
}
