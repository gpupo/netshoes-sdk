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

use Gpupo\NetshoesSdk\Console\Application;

/**
 * @codeCoverageIgnore
 */
abstract class AbstractCommand
{
    protected $list = ['main'];

    protected $app;

    protected function getApp()
    {
        return $this->app;
    }

    public function append(Application $app)
    {
        $this->app = $app;

        foreach ($this->list as $i) {
            $this->$i($this->getApp());
        }

        return $this->getApp();
    }
}
