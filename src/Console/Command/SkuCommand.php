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
class SkuCommand extends AbstractCommand
{
    protected $list = ['view', 'details', 'update'];

    public function view($app)
    {
        $this->getApp()->appendCommand('product:sku:view', 'Mostra os SKUs de um Produto')
            ->addArgument('productId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $id = $input->getArgument('productId');
                $output->writeln('Exibindo informações do SKU #<info>'.$id.'</info>');
                $p = $app->factorySdk($list)->factoryManager('sku')->findById($id);
                if (empty($p)) {
                    return $output->writeln('<error>Sku não encontrado!</error>');
                }
                $app->displayTableResults($output, $p);
            });
    }

    public function details($app)
    {
        $this->getApp()->appendCommand('product:sku:details', 'Mostra preço, estoque e situação de um SKU')
            ->addArgument('skuId', InputArgument::REQUIRED, 'Sku ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $sku = $app->factorySdk($list)->factoryManager('sku')
                    ->findById($input->getArgument('skuId'));
                $output->writeln('Stock: <info>'.$sku->getStock()->getAvailable().'</info>');
                $output->writeln('Status: <info>'.$sku->getStatus()->getActive().'</info>');
                $output->writeln('Price: R$<info>'.$sku->getPrice()->getPrice().'</info>');
                if ($sku->getPriceSchedule()) {
                    $app->displayTableResults($output, [$sku->getPriceSchedule()->toArray()]);
                }
            });
    }

    public function update($app)
    {
        $opts = [
            ['key' => 'file'],
        ];

        $this->getApp()->appendCommand('product:sku:update', 'Atualiza um SKU')
            ->setDefinition($this->getApp()->factoryDefinition($opts))
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts) {
                $list = $app->processInputParameters($opts, $input, $output);
                if (!file_exists($list['file'])) {
                    throw new \InvalidArgumentException('O arquivo ['.$list['file'].'] não existe!');
                }
                $data = json_decode(file_get_contents($list['file']), true);
                $sdk = $app->factorySdk($list);
                $sku = $sdk->createSku($data);
                $manager = $sdk->factoryManager('sku');
                $previous = $manager->findById($sku->getId());
                try {
                    $operation = $manager->update($sku, $previous);
                    $app->displayTableResults($output, [$operation]);
                } catch (\Exception $e) {
                    $output->writeln('<error>Erro na criação</error>');
                    $output->writeln('Message: <comment>'.$e->getMessage().'</comment>');
                    $output->writeln('Error Code: <comment>'.$e->getCode().'</comment>');
                }
            });
    }
}
