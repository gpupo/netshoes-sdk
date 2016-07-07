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

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\NetshoesSdk\Entity\AbstractMetadata;

class PriceScheduleCollection extends AbstractMetadata
{
    protected function getKey()
    {
        return 'items';
    }

    protected function factoryEntity(array $data)
    {
        return new PriceSchedule($data);
    }

    public function getCurrent()
    {
        if (1 > $this->count()) {
            return;
        }

        $current = null;

        foreach ($this->all() as $schedule) {
            if (empty($current) || $schedule->getDateInit() > $current->getDateInit()) {
                $current = $schedule;
            }
        }
        $convert = function ($int) {
            return date('d-m-Y', ($int / 1000));
        };
        $current->setDateInit($convert($schedule->getDateInit()));
        $current->setDateEnd($convert($schedule->getDateEnd()));

        return $current;
    }
}
