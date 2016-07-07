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

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
class ProductCommand extends AbstractCommand
{
    protected $list = ['view', 'insert', 'update'];

    public function insert($app)
    {
        $opts = [
            ['key' => 'file'],
        ];

        $this->getApp()->appendCommand('product:insert', 'Insere um produto a partir do Json de um arquivo')
            ->setDefinition($this->getApp()->factoryDefinition($opts))
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts) {
                $list = $app->processInputParameters($opts, $input, $output);

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
                    $output->writeln('Error Code: <comment>'.$e->getCode().'</comment>');
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

                $app->displayTableResults($output, [[
                    'Id'           => $p->getProductId(),
                    'Brand'        => $p->getBrand(),
                    'Department'   => $p->getDepartment(),
                    'Product Type' => $p->getProductType(),
                ]]);

                $output->writeln('<fg=yellow>Skus</>');

                $app->displayTableResults($output, $p->getSkus());

                $output->writeln('<fg=yellow>Detalhes</>');

                $command = $app->find('product:sku:details');
                $t = new ArrayInput([
                    'command' => 'product:sku:details',
                    'skuId'   => $id,

                ]);
                $command->run($t, $output);
            });
    }

    public function update($app)
    {
        $opts = [
            ['key' => 'file-previous'],
            ['key' => 'file-current'],
        ];

        $this->getApp()->appendCommand('product:update', 'Atualiza um SKU')
            ->setDefinition($this->getApp()->factoryDefinition($opts))
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts) {
                $list = $app->processInputParameters($opts, $input, $output);

                $data = [];

                foreach (['previous', 'current'] as $i) {
                    if (!file_exists($list['file-'.$i])) {
                        throw new \InvalidArgumentException('O arquivo ['.$list['file-'.$i].'] não existe!');
                    }

                    $data[$i] = json_decode(file_get_contents($list['file-'.$i]), true);
                }

                $sdk = $app->factorySdk($list);
                $current = $sdk->createProduct($data['current']);
                $previous = $sdk->createProduct($data['previous']);
                $manager = $sdk->factoryManager('product');

                try {
                    $operation = $manager->update($current, $previous);
                    $app->displayTableResults($output, [$operation]);
                } catch (\Exception $e) {
                    $output->writeln('<error>Erro na atualização</error>');
                    $output->writeln('Message: <comment>'.$e->getMessage().'</comment>');
                    $output->writeln('Error Code: <comment>'.$e->getCode().'</comment>');
                }
            });
    }
}
