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
class ScreenplayCommand extends AbstractCommand
{
    protected $list = ['all', 'productPostSimple','productPostMultiple', 'productUpdate',
        'productUpdateFull'];

    protected function runIfExists($name, $input, $output)
    {
       try {
           $c = $this->getApp()->find($name);
           $this->sendInfo('<fg=cyan>'.$name.'</fg=cyan>()');

           return $c->run($input, $output);
       } catch (\Exception $e) {
           $this->getLogger()->addDebug($e->getMessage());
       }
   }

   public function all($app)
   {
      $this->getApp()->appendCommand('screenplay:run', 'Run all');
   }

    public function productPostSimple($app)
    {
        $this->getApp()->appendCommand('screenplay:product:post:simple', '')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $output->writeln('Cadastro de quatro produtos contendo apenas um Sku');


                throw new \Exception("Implementar!");
            });
    }

    public function productPostMultiple($app)
    {
        $this->getApp()->appendCommand('screenplay:product:post:multiple', '')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $output->writeln('Cadastro de quatro produtos contendo mais de um Sku');

                throw new \Exception("Implementar!");
            });
    }

    public function productUpdate($app)
    {
        $this->getApp()->appendCommand('screenplay:product:update', '')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $output->writeln('Atualizar parcialmente no mínimo quatro produtos criados. As alterações devem incluir department, productType e attibutes');

                throw new \Exception("Implementar!");
            });
    }


    public function productUpdateFull($app)
    {
        $this->getApp()->appendCommand('screenplay:product:update:full', '')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $output->writeln('Atualizar três produtos cadastrados. As atualizações devem mudar o produto por completo exceto ID e SKU');

                throw new \Exception("Implementar!");
            });
    }

}
