<?php


namespace Afiqiqmal\HuaweiPush\Structure\Validation;


interface Extras
{
    /**
     * @return mixed
     */
    public function validate();

    /**
     * @return array
     */
    public function toArray();
}