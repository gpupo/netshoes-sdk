<?php
namespace Gpupo\NetshoesSdk\Traits;

use DateTime;
use DateTimeZone;

trait DateTimeTrait
{

    protected function dateFormat($string)
    {
        $timezone = new DateTimeZone('UTC');
        try {
            $datetime = new DateTime($string, $timezone);

            return $datetime->format('c');
        } catch (\Exception $e) {
            return null;
        }
    }
    protected function dateGet($key)
    {
        $value = $this->get($key);

        if (empty($value)) {
            return;
        }

        $string = $this->dateFormat($value);
//return $string;
        return str_replace('-03:00', '.000-03:00', $string);

    }
}
