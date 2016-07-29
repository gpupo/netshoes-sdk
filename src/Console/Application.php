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

namespace Gpupo\NetshoesSdk\Console;

use Gpupo\CommonSdk\Console\AbstractApplication;
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\NetshoesSdk\Entity\Product\Product;
use Gpupo\NetshoesSdk\Factory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class Application extends AbstractApplication
{
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<bg=green;options=bold>gpupo/netshoes-sdk</>');
        $output->writeln('<options=bold>Atenção! Esta aplicação é apenas uma '
        .'ferramenta de apoio ao desenvolvedor e não deve ser usada no ambiente de produção!'
        .'</>');

        return parent::doRun($input, $output);
    }

    protected $commonParameters = [
        [
            'key' => 'client_id',
        ],
        [
            'key' => 'access_token',
        ],
        [
            'key'     => 'env',
            'options' => ['sandbox', 'marketplace'],
            'default' => 'sandbox',
            'name'    => 'Version',
        ],
        [
            'key'     => 'sslVersion',
            'options' => ['SecureTransport', 'TLS'],
            'default' => 'SecureTransport',
            'name'    => 'SSL Version',
        ],
        [
            'key'     => 'registerPath',
            'default' => false,
        ],
    ];

    public function factorySdk(array $options, $loggerChannel = 'bin', $verbose = false)
    {
        return  Factory::getInstance()->setup($options, $this->factoryLogger($loggerChannel, $verbose));
    }

    public function displayOrder(Order $order, OutputInterface $output)
    {
        $output->writeln('Order #<comment>'.$order->getId().'</comment>');
        $this->displayTableResults($output, [$order->toLog()]);
        $this->displayTableResults($output, $order->getShipping()->getCustomer()->toLog());
        $this->displayTableResults($output, [$order->getShipping()->getInvoice()->toArray()]);
        $this->displayTableResults($output, [$order->getShipping()->getTransport()->toArray()]);
        $this->displayTableResults($output, $order->getShipping()->getItems()->toLog());
    }

    public function displayProduct(Product $p, OutputInterface $output)
    {
        $this->displayTableResults($output, [[
            'Id'           => $p->getProductId(),
            'Brand'        => $p->getBrand(),
            'Department'   => $p->getDepartment(),
            'Product Type' => $p->getProductType(),
        ]]);

        $output->writeln('<fg=yellow>Skus</>');
        $this->displayTableResults($output, $p->getSkus());
    }

    public function jsonLoadFromFile($filename)
    {
        if (!file_exists($filename)) {
            throw new \Exception('Filename '.$filename.' not exists!');
        }

        $string = file_get_contents($filename);

        return json_decode($string, true);
    }

    public function jsonSaveToFile(array $array, $filename, OutputInterface $output)
    {
        $json = json_encode($array, JSON_PRETTY_PRINT);
        file_put_contents($filename, $json);

        return $output->writeln('Arquivo <info>'.$filename.'</info> gerado.');
    }
}
