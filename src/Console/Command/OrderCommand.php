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

class OrderCommand extends AbstractCommand
{
    protected $list = ['view', 'update'];

    /**
     * @codeCoverageIgnore
     */
    protected function update($app)
    {
        $insertOptions = [
            ['key' => 'file'],
        ];

        $this->getApp()->appendCommand('order:update:to:invoiced', 'Move um pedido para a situação [Invoiced]')
        ->setDefinition($this->getApp()->factoryDefinition($insertOptions))
        ->addArgument('orderId', InputArgument::REQUIRED, 'Product ID')
        ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $insertOptions) {
            $list = $app->processInputParameters($insertOptions, $input, $output);
            $id = $input->getArgument('orderId');
            $data = json_decode(file_get_contents($list['file']), true);
            $sdk = $app->factorySdk($list);
            $manager = $sdk->factoryManager('order');
            $order = $sdk->createOrder($data);

            $order->setOrderNumber($id)
                ->setOrderStatus('invoiced');

            try {
                $operation = $manager->updateStatus($order);

                if (200 === $operation->getHttpStatusCode()) {
                    $output->writeln('<info>Successo!</info>');
                }
            } catch (\Exception $e) {
                $output->writeln('<error>Erro na mudança de status</error>');
                $output->writeln('Message: <comment>'.$e->getMessage().'</comment>');
                $output->writeln('Error Code: <comment>'.$e->getCode().'</comment>');
            }
        });
    }

    /**
     * @codeCoverageIgnore
     */
    protected function view($app)
    {
        $this->getApp()->appendCommand('order:view', 'Mostra detalhes de um pedido')
            ->addArgument('orderId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $id = $input->getArgument('orderId');
                $p = $app->factorySdk($list)->factoryManager('order')->findById($id);

                $output->writeln('Order #<comment>'.$id.'</comment>');
                $app->displayTableResults($output, [$p->toLog()]);
                $output->writeln('Shipping - Order #<comment>'.$id.'</comment>');
                $app->displayTableResults($output, [$p->getShipping()->toLog()]);

                $output->writeln('Shipping Items - Order #<comment>'.$id.'</comment>');
                $app->displayTableResults($output, $p->getShipping()->getItems()->toLog());
            });
    }
}
