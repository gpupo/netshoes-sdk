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
use Symfony\Component\Console\Input\ArrayInput;

/**
 * @codeCoverageIgnore
 */
class ScreenplayCommand extends AbstractCommand
{
    protected $list = ['all', 'main'];

    protected function screenplayList()
    {
        return  include 'screenplay.config.php';
    }

   public function all($app)
   {
       $screenplayList = $this->screenplayList();

       $this->getApp()->appendCommand('screenplay:run', 'Run all scripts')
       ->addArgument('path', InputArgument::REQUIRED, 'Script Directory')
       ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $screenplayList) {
           $list = $app->processInputParameters([], $input, $output);
           $path =  $input->getArgument('path');
           $output->writeln('Utilizando arquivos do diretório [' . $path . ']');

           foreach($screenplayList as $key => $value) {
               $s = 'screenplay:'.$key;
               $command = $app->find($s);
               $t = new ArrayInput([
                   'command' => $s,
                   'path'   => $path,
               ]);
               $command->run($t, $output);
           }
       });
   }

    public function main($app)
    {
        foreach($this->screenplayList() as $key => $todo) {
            $cname = 'screenplay:' . $key;
            $filename = str_replace(':', '.', $cname) . '.php';
            $this->getApp()->appendCommand($cname, $todo)
                ->addArgument('path', InputArgument::REQUIRED, 'Script Directory')
                ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $filename, $todo) {
                    $list = $app->processInputParameters([], $input, $output);
                    $path =  $input->getArgument('path');

                    $filePath = $path . $filename;
                    $output->writeln('- <info>'.$todo.'</info>');
                    $output->writeln('Executando ' . $filePath);

                    if (!file_exists($filePath)) {
                        copy(__DIR__ . '/screenplay.template.php', $filePath);
                    }

                    $sdk = $app->factorySdk($list);
                    $implemented = false;

                    include $filePath;

                    if(empty($implemented)) {
                        $output->writeln('- <error>'.$filePath.' FAIL!</>');

                        throw new \Exception("Abort");

                    }
                });
        }
    }
}
