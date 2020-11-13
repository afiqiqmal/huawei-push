<?php


namespace Afiqiqmal\HuaweiPush\Client;


class HttpRequest
{
    function __construct($request)
    {
        $this->request = $request;
    }

    function url()
    {
        return (string) $this->request->getUri();
    }

    function method()
    {
        return $this->request->getMethod();
    }

    function body()
    {
        return (string) $this->request->getBody();
    }

    function headers()
    {
        return collect($this->request->getHeaders())->mapWithKeys(function ($values, $header) {
            return [$header => $values[0]];
        })->all();
    }
}