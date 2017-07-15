<?php
namespace common\helpers;

class Crypt
{
    public static function encode($string)
    {
        if (!empty($string)) {
            $string = base64_encode($string);
        }

        return $string;
    }

    public static function decode($string)
    {
        if (!empty($string)) {
            $string = base64_decode($string);
        }

        return $string;
    }
}
