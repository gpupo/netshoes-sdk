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

class TemplatesCommand
{
    public static function append(Application $app)
    {
        foreach ([
            'brands',
            'flavors',
            'colors',
            'sizes',
        ] as $templateKey) {
            $app->appendCommand('templates:' . $templateKey, 'List of ' . $templateKey)
                ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $templateKey) {
                    $list = $app->processInputParameters([], $input, $output);
                    $responseList = $app->factorySdk($list)->factoryManager('templates')->fetchByRoute($templateKey);
                    $app->displayTableResults($output, $responseList);
            });
        }

        $app->appendCommand('templates:departments', 'List of departments')
            ->addArgument('buId', InputArgument::REQUIRED, 'Business unit id - NS = Netshoes e ZT = Zattini')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $responseList = $app->factorySdk($list)->factoryManager('templates')
                    ->fetchByRoute('departments', 0, 50, [
                        'buId' => $input->getArgument('buId'),
                    ]);
                $app->displayTableResults($output, $responseList);
        });

        $app->appendCommand('templates:productTypes', 'List of productTypes')
            ->addArgument('departmentCode', InputArgument::REQUIRED, 'Id do departamento')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $responseList = $app->factorySdk($list)->factoryManager('templates')
                    ->fetchByRoute('productTypes', 0, 50, [
                        'departmentCode' => $input->getArgument('departmentCode'),
                    ]);
                $app->displayTableResults($output, $responseList);
        });

        $app->appendCommand('templates:attributes', 'List of attributes')
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

        $app->appendCommand('templates:tree', 'Tree of templates')
            ->addArgument('buId', InputArgument::REQUIRED, 'Business unit id - NS = Netshoes e ZT = Zattini')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $buId = $input->getArgument('buId');
                $manager = $app->factorySdk($list)->factoryManager('templates');

                $departaments = $manager->fetchByRoute('departments', 0, 50, [
                    'buId' => $buId,
                ]);

                foreach ($departaments as $departament) {
                    $output->writeln('<info>' . $departament->getId() . '</info> ' . $departament->getName());

                    $types = $manager->fetchByRoute('productTypes', 0, 50, [
                            'departmentCode' => $departament->getId(),
                    ]);

                    foreach ($types as $type) {
                        $output->writeln("\t - " . '<fg=yellow>' . $type->getId() . '</> ' . $type->getName());

                        $attributes = $manager->fetchByRoute('attributes', 0, 50, [
                                'departmentCode'  => $departament->getId(),
                                'productTypeCode' => $type->getId(),
                        ]);

                        /*
                        foreach($attributes as $attribute) {
                            $output->writeln("\t\t * " . '<fg=blue>'.$attribute->getId().'</> ' . $attribute->getName());
                        }
                        */
                    }

                    $output->writeln('<fg=yellow>------</>');
                }
        });

        return $app;
    }
}
