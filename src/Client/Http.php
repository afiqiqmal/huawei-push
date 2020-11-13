<?php


namespace Afiqiqmal\HuaweiPush\Client;

/**
 * @method static PendingHttpRequest accept(string $contentType)
 * @method static PendingHttpRequest asForm()
 * @method static PendingHttpRequest asJson()
 * @method static PendingHttpRequest asMultipart()
 * @method static PendingHttpRequest beforeSending(callable $callback)
 * @method static PendingHttpRequest contentType(string $contentType)
 * @method static PendingHttpRequest timeout(int $seconds)
 * @method static PendingHttpRequest withBasicAuth(string $username, string $password)
 * @method static PendingHttpRequest withCookies(array $cookies, string $domain)
 * @method static PendingHttpRequest withDigestAuth(string $username, string $password)
 * @method static PendingHttpRequest withHeaders(array $headers)
 * @method static PendingHttpRequest withOptions(array $options)
 * @method static PendingHttpRequest withoutRedirecting()
 * @method static PendingHttpRequest withoutVerifying()
 * 
 */
class Http
{
    static function __callStatic($method, $args)
    {
        return PendingHttpRequest::new()->{$method}(...$args);
    }
}