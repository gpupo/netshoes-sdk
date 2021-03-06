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

namespace Gpupo\NetshoesSdk\Traits;

use DateTime;
use DateTimeZone;
use DateInterval;

trait DateTimeTrait
{
    protected function dateFormat($string)
    {
        $zone = 'America/Sao_Paulo';

        if (intval($string) === $string) {
            $df = date_default_timezone_get();
            if ($df !== $zone) {
                date_default_timezone_set($zone);
            }
            $date = date('c', $string / 1000);

            if ($df !== $zone) {
                date_default_timezone_set($df);
            }

            return $date;
        }

        $timezone = new DateTimeZone($zone);
        $datetime = new DateTime($string, $timezone);

        return $datetime->format('c');
    }

    protected function dateGet($key)
    {
        $value = $this->get($key);

        if (!empty($value)) {
            $string = $this->dateFormat($value);

            return str_replace('-03:00', '.000-03:00', $string);
        }
    }

    protected function dateMove($move)
    {
        $date = new DateTime();
        $date->sub(new DateInterval($move));

        return $date->format('c');
    }
}
