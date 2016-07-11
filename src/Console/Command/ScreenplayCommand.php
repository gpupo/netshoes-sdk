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
            $path = $input->getArgument('path');
            $output->writeln('Utilizando arquivos do diretório ['.$path.']');

            foreach ($screenplayList as $key => $value) {
                $s = 'screenplay:'.$key;
                $command = $app->find($s);
                $t = new ArrayInput([
                   'command' => $s,
                   'path'    => $path,
                ]);

                //$output->writeln('./bin/netshoes-sdk '.$s);
                $command->run($t, $output);
            }
        });
    }

    public function main($app)
    {
        foreach ($this->screenplayList() as $key => $todo) {
            $cname = 'screenplay:'.$key;
            $pow = explode(':', $key);
            $f = current($pow);
            $filename = str_replace([$f.':', ':'], [$f . '/', '.'], $key).'.php';
            $this->getApp()->appendCommand($cname, $todo)
                ->addArgument('path', InputArgument::REQUIRED, 'Script Directory')
                ->setCode(function (InputInterface $input, OutputInterface $output) use ($app, $filename, $todo, $cname) {
                    $list = $app->processInputParameters([], $input, $output);
                    $path = $input->getArgument('path');

                    $filePath = $path.$filename;
                    $output->writeln('<options=bold>'.$todo.'</>');

                    if (!file_exists($filePath)) {
                        throw new \Exception("Roteiro não implementado:" . $filePath, 1);
                    }

                    $sdk = $app->factorySdk($list, 'screenplay', false);

                    $sdk->getLogger()->addDebug($cname, [
                        'file' => $filePath,
                    ]);

                    $implemented = false;

                    require $filePath;

                });
        }
    }
}
