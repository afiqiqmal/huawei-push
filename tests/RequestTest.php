<?php


use Afiqiqmal\HuaweiPush\HuaweiPushKit;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testMissingAccessToken()
    {
        try {
            $access = HuaweiPushKit::make([
                'app_id' => $_ENV['APP_ID'] ?? null,
                'client_secret' => $_ENV['APP_SECRET'] ?? null
            ])
                ->getAccessToken();

            $this->assertTrue(false);

        } catch (\Afiqiqmal\HuaweiPush\Exception\HuaweiException $exception) {
            $this->assertTrue(true);
        }
    }
}