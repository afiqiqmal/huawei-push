<?php


namespace Afiqiqmal\HuaweiPush;


use Afiqiqmal\HuaweiPush\Client\Http;
use Afiqiqmal\HuaweiPush\Constant\Endpoint;
use Afiqiqmal\HuaweiPush\Exception\HuaweiException;
use Afiqiqmal\HuaweiPush\Structure\NotificationPayload;

class HuaweiPushKit
{
    protected $config = [];

    public function __construct(array $config = [])
    {
        $this->config = $config;

        if (!($config['app_id'] ?? null)) {
            throw new HuaweiException("Missing Client ID");
        }

        if (!($config['client_secret'] ?? null)) {
            throw new HuaweiException("Missing Client Secret");
        }
    }

    public static function make(array $arguments)
    {
        return new self($arguments);
    }

    public function getAccessToken()
    {
        $response = Http::asForm()
            ->post(Endpoint::TOKEN, [
                'grant_type' => 'client_credentials',
                'client_id' => $this->config['app_id'],
                'client_secret' => $this->config['client_secret'],
            ]);

        if (!$response->ok()) {
            throw new HuaweiException($response->json()['error_description'] ?? 'Unknown Error', $response->status());
        }

        return $response->json();
    }

    public function withAccessToken($accessToken)
    {
        $this->config['access_token'] = $accessToken;
        return $this;
    }

    public function push(NotificationPayload $payload)
    {
        $response = Http::asJson()
            ->withHeaders([
                'Authorization' => "Bearer {$this->config['access_token']}"
            ])
            ->post(
                str_replace('{appid}', $this->config['app_id'], Endpoint::PUSH),
                $payload->toArray()
            );

        return $response->json();
    }
}