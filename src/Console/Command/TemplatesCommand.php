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

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
class TemplatesCommand extends AbstractCommand
{
    public function main($app)
    {
        foreach ([
            'brands',
            'flavors',
            'colors',
            'sizes',
        ] as $templateKey) {
            $this->getApp()->appendCommand('templates:'.$templateKey, 'List of '.$templateKey)
                ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $templateKey) {
                    $list = $app->processInputParameters([], $input, $output);
                    $responseList = $app->factorySdk($list)->factoryManager('templates')->fetchByRoute($templateKey);
                    $app->displayTableResults($output, $responseList);
                });
        }

        $this->getApp()->appendCommand('templates:departments', 'List of departments')
            ->addArgument('buId', InputArgument::REQUIRED, 'Business unit id - NS = Netshoes e ZT = Zattini')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $responseList = $app->factorySdk($list)->factoryManager('templates')
                    ->fetchByRoute('departments', 0, 50, [
                        'buId' => $input->getArgument('buId'),
                    ]);
                $app->displayTableResults($output, $responseList);
            });

        $this->getApp()->appendCommand('templates:productTypes', 'List of productTypes')
            ->addArgument('departmentCode', InputArgument::REQUIRED, 'Id do departamento')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $responseList = $app->factorySdk($list)->factoryManager('templates')
                    ->fetchByRoute('productTypes', 0, 50, [
                        'departmentCode' => $input->getArgument('departmentCode'),
                    ]);
                $app->displayTableResults($output, $responseList);
            });

        $this->getApp()->appendCommand('templates:attributes', 'List of attributes')
            ->addArgument('departmentCode', InputArgument::REQUIRED, 'Id do departamento')
            ->addArgument('productTypeCode', InputArgument::REQUIRED, 'Id do Product Type')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $responseList = $app->factorySdk($list)->factoryManager('templates')
                    ->fetchByRoute('attributes', 0, 50, [
                        'departmentCode'  => $input->getArgument('departmentCode'),
                        'productTypeCode' => $input->getArgument('productTypeCode'),
                    ]);
                $app->displayTableResults($output, $responseList);
            });

        $this->getApp()->appendCommand('templates:tree', 'Tree of templates')
            ->addArgument('buId', InputArgument::REQUIRED, 'Business unit id - NS = Netshoes e ZT = Zattini')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $buId = $input->getArgument('buId');
                $manager = $app->factorySdk($list)->factoryManager('templates');

                $departaments = $manager->fetchByRoute('departments', 0, 50, [
                    'buId' => $buId,
                ]);

                foreach ($departaments as $departament) {
                    $output->writeln('<info>'.$departament->getId().'</info> '.$departament->getName());

                    $types = $manager->fetchByRoute('productTypes', 0, 50, [
                            'departmentCode' => $departament->getId(),
                    ]);

                    foreach ($types as $type) {
                        $output->writeln("\t - ".'<fg=yellow>'.$type->getId().'</> '.$type->getName());
                    }

                    $output->writeln('<fg=yellow>------</>');
                }
            });

        return $app;
    }
}
