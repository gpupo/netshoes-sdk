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

use Closure;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
class OrderCommand extends AbstractCommand
{
    protected $list = ['view', 'update', 'list'];

    protected function update($app)
    {
        $this->factoryUpdate($app, 'approved');
        $this->factoryUpdate($app, 'invoiced');
        $this->factoryUpdate($app, 'shipped');
        $this->factoryUpdate($app, 'delivered');
    }

    protected function list($app)
    {
        $this->factoryList($app, 'approved');
        $this->factoryList($app, 'invoiced');
        $this->factoryList($app, 'shipped');
        $this->factoryList($app, 'delivered');
        $this->factoryList($app, 'canceled');
    }

    protected function factoryUpdate($app, $type, Closure $decorator = null)
    {
        $opts = [
            ['key' => 'file'],
        ];

        $this->getApp()->appendCommand('order:update:to:'.$type, 'Move um pedido para a situação ['.$type.']', $opts)
            ->addArgument('orderId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $opts, $type, $decorator) {
                $list = $app->processInputParameters($opts, $input, $output);
                $id = $input->getArgument('orderId');
                if (!file_exists($list['file'])) {
                    throw new \InvalidArgumentException('O arquivo ['.$list['file'].'] não existe!');
                }
                $data = json_decode(file_get_contents($list['file']), true);
                $sdk = $app->factorySdk($list);
                $manager = $sdk->factoryManager('order');
                $order = $sdk->createOrder($data);
                $order->setOrderNumber($id)->setOrderStatus($type);

                if (!empty($decorator)) {
                    $order = $decorator($order);
                }

                try {
                    $output->writeln('Iniciando mudança de status do pedido #<info>'
                    .$id.'</info> => <comment>'.$type.'</comment>');

                    $operation = $manager->updateStatus($order);

                    if (200 === $operation->getHttpStatusCode()) {
                        $output->writeln('<info>Successo!</info>');
                    }
                } catch (\Exception $e) {
                    $app->showException($e, $output, 'Erro na mudança de status');
                }
            });
    }

    protected function view($app)
    {
        $this->getApp()->appendCommand('order:view', 'Mostra detalhes de um pedido')
            ->addArgument('orderId', InputArgument::REQUIRED, 'Product ID')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $id = $input->getArgument('orderId');
                $p = $app->factorySdk($list)->factoryManager('order')->findById($id);
                $app->displayOrder($p, $output);
            });
    }

    protected function factoryList($app, $type)
    {
        $this->getApp()->appendCommand('order:list:'.$type, 'Mostra os pedidos mais recentes em status ['.$type.']')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $type) {
                $list = $app->processInputParameters([], $input, $output);
                $collection = $app->factorySdk($list)->factoryManager('order')
                ->fetch(0, 50, ['orderStatus' => $type]);

                foreach ($collection as $p) {
                    $app->displayOrder($p, $output);
                    $output->writeln("\n\n--------------------------------------\n\n");
                }
            });
    }
}
