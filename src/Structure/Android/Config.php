<?php


namespace Afiqiqmal\HuaweiPush\Structure\Android;


use Afiqiqmal\HuaweiPush\Helper\ArrayHelper;
use Afiqiqmal\HuaweiPush\Structure\Validation\Extras;

class Config implements Extras
{
    /**
     * Mode for the HUAWEI Push Kit server to cache messages sent to an offline user.
     * These cached messages will be delivered once the user goes online again
     *
     * @var int
     */
    protected $collapse_state = -1;

    /**
     * Delivery priority of a data message. The options are as follows:
     * 1- HIGH
     * 2- NORMAL
     *
     * @var int
     */
    protected $urgency = 3;

    /**
     * Scenario where a high-priority data message is sent. The options are as follows:
     * 1 - PLAY_VOICE: voice playing
     * 2 - VOIP: VoIP call
     *
     * @var int
     */
    protected $category;

    /**
     * Message cache time, in seconds. When a user device is offline, the HUAWEI Push Kit server caches messages.
     * If the user device goes online within the message cache time, the messages are delivered.
     * Otherwise, the messages are discarded. The default value is 86400 (1 day), and the maximum value is 1296000 (15 days).
     *
     * @var int
     */
    protected $timeToLive;

    /**
     * Tag of a message in a batch delivery task. The tag is returned to the app server when HUAWEI Push Kit sends the message receipt
     *
     * @var string
     */
    protected $tags;

    /**
     * State of a mini program when a quick app sends a data message
     *
     * @var int
     */
    protected $staging = true;


    /**
     * Custom message payload. If the data parameter is set, the value of the message.data field is overwritten.
     *
     * @var array
     */
    protected $data;


    /**
     * Android notification message structure. For details about the parameters, please refer to the definition in AndroidNotification Structure.
     * @link https://developer.huawei.com/consumer/en/doc/development/HMSCore-References-V5/https-send-api-0000001050986197-V5#EN-US_TOPIC_0000001050986197__p17958923151311
     *
     * @var Notification
     */
    protected $notification;


    public static $urgencyName = [
        1 => 'HIGH',
        2 => 'NORMAL'
    ];

    public static $categoryName = [
        1 => 'PLAY_VOICE',
        2 => 'VOIP'
    ];

    /**
     * @return Config
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param int $collapse_state
     * @return Config
     */
    public function setCollapseState(int $collapse_state)
    {
        $this->collapse_state = $collapse_state;
        return $this;
    }

    /**
     * @param int $urgency
     * @return Config
     */
    public function setUrgency(int $urgency)
    {
        $this->urgency = $urgency;
        return $this;
    }

    /**
     * @param int $category
     * @return Config
     */
    public function setCategory(int $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @param int $timeToLive
     * @return Config
     */
    public function setTimeToLive(int $timeToLive)
    {
        $this->timeToLive = $timeToLive;
        return $this;
    }

    /**
     * @param string $tags
     * @return Config
     */
    public function setTags(string $tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param int $staging
     * @return Config
     */
    public function isStaging(int $staging)
    {
        $this->staging = $staging;
        return $this;
    }

    /**
     * @param array $data
     * @return Config
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param Notification $notification
     * @return Config
     */
    public function setNotification(Notification $notification)
    {
        $this->notification = $notification;
        return $this;
    }


    public function toArray()
    {
        return ArrayHelper::filter([
            'collapse_key' => $this->collapse_state,
            'urgency' => self::$urgencyName[$this->urgency] ?? null,
            'category' => self::$categoryName[$this->category] ?? null,
            'ttl' => "{$this->timeToLive}s",
            'bi_tag' => $this->tags,
            'fast_app_target' => $this->staging ? 1 : 2,
            'data' => $this->data ? json_encode($this->data) : null,
            'notification' => $this->notification ? $this->notification->toArray() : null,
        ]);
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }
}