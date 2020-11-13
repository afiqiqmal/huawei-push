<?php


namespace Afiqiqmal\HuaweiPush\Helper;


class ArrayHelper
{
    static function filter($array)
    {
        return array_filter($array, function ($var) {
            return ($var !== NULL && $var !== FALSE && $var !== '');
        });
    }
}