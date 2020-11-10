<?php


namespace Afiqiqmal\HuaweiPush\Exception;


use Throwable;

class HuaweiException extends \RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}