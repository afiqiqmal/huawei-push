[![Build Status](https://travis-ci.org/afiqiqmal/huawei-push.svg?branch=master)](https://travis-ci.org/afiqiqmal/huawei-push)
[![Coverage](https://img.shields.io/codecov/c/github/afiqiqmal/huawei-push.svg)](https://codecov.io/gh/afiqiqmal/huawei-push)
[![Packagist](https://img.shields.io/packagist/dt/afiqiqmal/huawei-push.svg)](https://packagist.org/packages/afiqiqmal/huawei-push)
[![Packagist](https://img.shields.io/packagist/v/afiqiqmal/huawei-push.svg)](https://packagist.org/packages/afiqiqmal/huawei-push)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/paypalme/mhi9388?locale.x=en_US)

![alt text](https://banners.beyondco.de/Huawei%20Push%20Kit%20PHP.png?theme=dark&packageName=afiqiqmal%2Fhuawei-push&pattern=brickWall&style=style_1&description=&md=1&showWatermark=0&fontSize=100px&images=cloud)

# Huawei Push PHP


### Installation
```
composer require afiqiqmal/huawei-push
```

### Usage

#### Get Access Token
References : [Huawei OAuth](https://developer.huawei.com/consumer/en/doc/development/HMSCore-Guides-V5/open-platform-oauth-0000001053629189-V5#EN-US_TOPIC_0000001053629189__section12493191334711)
```php
$access = HuaweiPushKit::make([
    'app_id' => 'YOUR APP ID',
    'client_secret' => 'YOUR CLIENT SECRET'
])
    ->getAccessToken();


//Laravel
$access = HuaweiPushKit::make(config('huawei'))->getAccessToken();
$access = app(HuaweiPushKit::class)->getAccessToken();
```

Response

```json
{
    "access_token": "ACCESS TOKEN",
    "expires_in": 3600, // seconds
    "token_type": "Bearer"
}
```

#### Push Message

References : [Huawei Push Kit](https://developer.huawei.com/consumer/en/doc/development/HMSCore-References-V5/https-send-api-0000001050986197-V5#EN-US_TOPIC_0000001050986197__p2559323141314)
```php
$response = HuaweiPushKit::make([])
    ->withAccessToken('ACCESS TOKEN')
    ->push(
        NotificationPayload::make()
            ->setValidateOnly(false)
            ->setMessage(
                Message::make()
                    ->setNotification(
                        Notification::make()
                            ->setTitle("Testing Title")
                            ->setBody("Body")
                            ->setImage("https://seeklogo.com/images/L/laravel-logo-41EC1D4C3F-seeklogo.com.png")
                    )
                    ->setAndroid(
                        Config::make()
                            ->setUrgency(2)
                            ->setCategory(1)
                            ->setTimeToLive(3360)
                            ->setTags('TrumpIsDown')
                            ->isStaging(true)
                            ->setNotification(
                                AndroidNotification::make()
                                    ->setClickAction(
                                        ClickAction::make()
                                        ->setType(1)
                                        ->setIntent("pushscheme://com.huawei.hms.hmsdemo/deeplink?#Intent;i.isFeed=1;S.feedDocId=0LauP4X6;end")
                                        ->setUrl('https://www.google.com')
                                    )
                                    ->setImage('https://seeklogo.com/images/L/laravel-logo-41EC1D4C3F-seeklogo.com.png')
                                    ->setIcon('/raw/ic_launcher2')
                                    ->setColor('#FFFFFF')
                                    ->setSound('/raw/shake')
                                    ->setDefaultSound(false)
                                    ->setPriority(3)
                                    ->setChannelId("HMSTestDemo")
                                    ->setAutoClear(100000) // ms
                                    ->setSummary("Summary")
                                    ->setStyle(0)
                                    ->setNotifyId(123456)

                                    ->setButtons([
                                        Button::make()->setName("Home")->setActionType(0)
                                    ])
                            )
                    )
                    ->setTopic("Topic")
            )
    );
```

Response

```json
{
    "code": "80000000",
    "msg": "Success",
    "requestId": "160502268063038626000406"
}
```



### TODO

- WebPUSH
- APNS


## License
Licensed under the [MIT license](http://opensource.org/licenses/MIT)


<a href="https://www.paypal.com/paypalme/mhi9388?locale.x=en_US"><img src="https://i.imgur.com/Y2gqr2j.png" height="40"></a>  