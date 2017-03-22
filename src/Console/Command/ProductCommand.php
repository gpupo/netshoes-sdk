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

namespace Gpupo\NetshoesSdk\Console\Command;

use Gpupo\CommonSchema\TranslatorDataCollection;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class ProductCommand extends AbstractCommand
{
    protected $list = ['view', 'status', 'insert', 'update', 'fetch', 'translateTo', 'translateUpdate'];

    public function fetch($app)
    {
        $this->getApp()->appendCommand('product:list', 'List')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $collection = $app->factorySdk($list)->factoryManager('product')->fetch(0, 50);
                foreach ($collection as $p) {
                    $app->displayProduct($p, $output);
                    $output->writeln("\n\n--------------------------------------\n\n");
                }
            });
    }

    public function insert($app)
    {
        $opts = [
            ['key' => 'file'],
        ];

        $this->getApp()->appendCommand('product:insert', 'Insere um produto a partir do Json de um arquivo', $opts)
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts) {
                $list = $app->processInputParameters($opts, $input, $output);

                $data = $app->jsonLoadFromFile($list['file']);
                $sdk = $app->factorySdk($list);
                $product = $sdk->createProduct($data);

                try {
                    $operation = $sdk->factoryManager('product')->save($product);

                    if (202 === $operation->getHttpStatusCode()) {
                        $output->writeln('<info>Successo!</info>');
                    }
                } catch (\Exception $e) {
                    $app->showException($e, $output);
                }
            });
    }

    public function translateTo($app)
    {
        $this->getApp()->appendCommand('product:translate:to', 'Exporta o produto no padrão comum')
            ->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            ->addArgument('filenameOutput', InputArgument::REQUIRED, 'Caminho do arquivo que será gerado')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $id = $input->getArgument('productId');
                $filenameOutput = $input->getArgument('filenameOutput');
                $p = $app->factorySdk($list)->factoryManager('product')->translatorFindById($id);

                if (empty($p)) {
                    return $output->writeln('<error>Produto não encontrado!</error>');
                }

                return $app->jsonSaveToFile($p->toArray(), $filenameOutput, $output);
            });
    }

    public function translateUpdate($app)
    {
        $this->getApp()->appendCommand('product:translate:update', 'Atualiza o produto (schema)')
            ->addArgument('filenameInput', InputArgument::REQUIRED, 'Arquivo json com dados do produto')
            ->addArgument('filenamePrevious', InputArgument::OPTIONAL, 'Previous file')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $filenameInput = $input->getArgument('filenameInput');
                $current = new TranslatorDataCollection($app->jsonLoadFromFile($filenameInput));
                $previous = null;
                $filenamePrevious = $input->getArgument('filenamePrevious');

                if (!empty($filenamePrevious)) {
                    $previous = new TranslatorDataCollection($app->jsonLoadFromFile($filenamePrevious));
                }

                $sdk = $app->factorySdk($list);
                $manager = $sdk->factoryManager('product');

                try {
                    $operation = $manager->translatorUpdate($current, $previous);
                    $app->displayTableResults($output, [$operation]);
                } catch (\Exception $e) {
                    $app->showException($e, $output);
                }
            });
    }

    public function view($app)
    {
        $this->getApp()->appendCommand('product:view', 'Consulta a situação de um produto')
            ->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $id = $input->getArgument('productId');
                $p = $app->factorySdk($list)->factoryManager('product')->findById($id);

                if (empty($p)) {
                    return $output->writeln('<error>Produto não encontrado!</error>');
                }

                $app->displayProduct($p, $output);

                $output->writeln('<fg=yellow>Detalhes</>');
                $command = $app->find('product:sku:details');
                $t = new ArrayInput([
                    'command' => 'product:sku:details',
                    'skuId'   => $id,

                ]);
                $command->run($t, $output);
            });
    }

    public function status($app)
    {
        $this->getApp()->appendCommand('product:status', 'Consulta o status de um produto')
            ->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $id = $input->getArgument('productId');
                $output->writeln('Status do Product #<info>'.$id.'</info>');
                $status = $app->factorySdk($list)->factoryManager('product')->fetchStatusById($id);
                $app->displayTableResults($output, [$status->toLog()]);
            });
    }

    public function update($app)
    {
        $opts = [
            ['key' => 'file-previous'],
            ['key' => 'file-current'],
        ];

        $this->getApp()->appendCommand('product:update', 'Atualiza um SKU', $opts)
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts) {
                $list = $app->processInputParameters($opts, $input, $output);

                $data = [];

                foreach (['previous', 'current'] as $i) {
                    if (!file_exists($list['file-'.$i])) {
                        throw new \InvalidArgumentException('O arquivo ['.$list['file-'.$i].'] não existe!');
                    }

                    $data[$i] = $app->jsonLoadFromFile($list['file-'.$i]);
                }

                $sdk = $app->factorySdk($list);
                $current = $sdk->createProduct($data['current']);
                $previous = $sdk->createProduct($data['previous']);
                $manager = $sdk->factoryManager('product');

                try {
                    $operation = $manager->update($current, $previous);
                    $app->displayTableResults($output, [$operation]);
                } catch (\Exception $e) {
                    $app->showException($e, $output);
                }
            });
    }
}
