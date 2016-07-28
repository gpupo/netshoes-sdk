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
use Gpupo\CommonSchema\TranslatorDataCollection;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class OrderCommand extends AbstractCommand
{
    protected $list = ['view', 'factoryForStatus', 'translateTo', 'translateFrom', 'queue'];

    protected $statusList = ['approved', 'invoiced', 'shipped', 'delivered', 'canceled'];

    protected function factoryForStatus($app)
    {
        foreach ($this->statusList as $status) {
            $this->factoryUpdate($app, $status);
            $this->factoryList($app, $status);
        }
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
                $data = $app->jsonLoadFromFile($list['file']);
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

                    $operation = $manager->update($order);

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

                if (0 === $collection->count()) {
                    return $output->writeln('<error>Nenhum pedido encontrado!</error>');
                }
                foreach ($collection as $p) {
                    $app->displayOrder($p, $output);
                }
            });
    }

    protected function queue($app)
    {
        $this->getApp()->appendCommand('order:queue', 'Mostra os pedidos novos e que ainda aguardam processamento')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $collection = $app->factorySdk($list)->factoryManager('order')->fetchQueue();

                if (0 === $collection->count()) {
                    return $output->writeln('<info>Nenhum pedido na fila</info>');
                }

                $app->displayTableResults($output, $collection->toArray(), [
                    'merchant', 'orderNumber', 'acceptedOffer', 'orderDate',
                    'customer', 'billingAddress', 'quantity', 'freight', 'total',
                ], 49, true);
            });
    }

    public function translateTo($app)
    {
        $this->getApp()->appendCommand('order:translate:to', 'Exporta o pedido no padrão comum')
            ->addArgument('orderId', InputArgument::REQUIRED, 'Order ID')
            ->addArgument('filenameOutput', InputArgument::REQUIRED, 'Caminho do arquivo que será gerado')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $id = $input->getArgument('orderId');
                $filenameOutput = $input->getArgument('filenameOutput');
                $p = $app->factorySdk($list)->factoryManager('order')->translatorFindById($id);

                if (empty($p)) {
                    return $output->writeln('<error>Pedido não encontrado!</error>');
                }

                return $app->jsonSaveToFile($p->toArray(), $filenameOutput, $output);
            });
    }

    public function translateFrom($app)
    {
        $this->getApp()->appendCommand('order:translate:from', 'Importa o pedido no padrão comum')
            ->addArgument('filenameInput', InputArgument::REQUIRED, 'Arquivo json com dados do pedido')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $foreign = new TranslatorDataCollection($app->jsonLoadFromFile($input->getArgument('filenameInput')));

                $p = $app->factorySdk($list)->factoryManager('order')->factoryTranslator([
                    'foreign' => $foreign,
                ]);

                $app->displayOrder($p->translateFrom(), $output);
            });
    }
}
