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

namespace Gpupo\Tests\NetshoesSdk\Console;

use Gpupo\NetshoesSdk\Console\Application;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;

class ApplicationTest extends TestCaseAbstract
{
    /**
     * @test Dá acesso a ``Factory``
     * @test
     */
    public function factorySdk()
    {
        $app = new Application();

        $sdk = $app->factorySdk([
            'client_id'    => 'x882ja',
            'access_token' => '8998329jejd',
        ]);

        $this->assertInstanceOf('\Gpupo\NetshoesSdk\Factory', $sdk);
    }

    /**
     * @test Recebe novas funções
     * @test
     */
    public function appendCommand()
    {
        $app = new Application();

        $app->appendCommand('foo:bar', 'Test')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $output->writeln('Hello World');
            });

        $command = $app->find('foo:bar');
        $commandTester = new CommandTester($command);
        $commandTester->execute(['command' => $command->getName()]);
        $this->assertSame('Hello World', trim($commandTester->getDisplay()));
    }
}
