<?php

namespace App\Traits;

trait DataFormatter 
{
    protected function arrayToArrayOfObject($array = []) : array 
    {
        $result = json_decode(json_encode($array));

        return $result;
    }

    protected function stringToArray($string, $separator)
    {
        $result = [];

        if ($string) {
            $result = explode($separator, $string);
        }

        return $result;
    }

    protected function arrayToString($string, $separator)
    {
        $result = [];

        if ($string) {
            $result = implode($separator, $string);
        }

        return $result;
    }

    protected function objectToString($array = [])
    {
        $result = json_encode($array);

        return $result;
    }
}