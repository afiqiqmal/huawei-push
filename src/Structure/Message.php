<?php


namespace Afiqiqmal\HuaweiPush\Structure;


class Message
{
    /**
     * Custom message payload, which can be a common string or a string in JSON format
     *
     * @var array
     */
    private $data;

    /**
     * Notification message content. For details about the parameters, please refer to the definition of Notification Structure.
     * @link https://developer.huawei.com/consumer/en/doc/development/HMSCore-References-V5/https-send-api-0000001050986197-V5#EN-US_TOPIC_0000001050986197__p10372202511312
     *
     * @var Notification
     */
    private $notification;

    /**
     * Android message push control
     *
     * @var \Afiqiqmal\HuaweiPush\Structure\Android\Config
     */
    private $android;

    /**
     * Push token of the target user of a message. You must and only can set one of token, topic, and condition
     *
     * @var array
     */
    private $targetDeviceIds;

    /**
     * Topic subscribed by the target user of a message.
     * (Currently, this parameter applies only to Android apps.) You must and can only set one of token, topic, and condition.
     *
     * @var string
     */
    private $topic;


    /**
     * Condition (topic combination expression) for sending a message to the target user.
     * (Currently, this parameter applies only to Android apps.) You must and can only set one of token, topic, and condition
     *
     * @var string
     */
    private $condition;


    /**
     * @return Message
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param array $data
     * @return Message
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param Notification $notification
     * @return Message
     */
    public function setNotification(Notification $notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @param Android\Config $android
     * @return Message
     */
    public function setAndroid(Android\Config $android)
    {
        $this->android = $android;

        return $this;
    }

    /**
     * @param array $targetDeviceIds
     * @return Message
     */
    public function setTargetDeviceIds(array $targetDeviceIds)
    {
        $this->targetDeviceIds = $targetDeviceIds;

        return $this;
    }

    /**
     * @param string $topic
     * @return Message
     */
    public function setTopic(string $topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * @param string $condition
     * @return Message
     */
    public function setCondition(string $condition)
    {
        $this->condition = $condition;

        return $this;
    }


    public function toArray()
    {
        return [
            'data' => $this->data ?? null,
            'notification' => $this->notification ? $this->notification->toArray() : null,
            'android' => $this->android ? $this->android->toArray() : null,
            'token' => $this->targetDeviceIds,
            'condition' => $this->condition,
            'topic' => $this->topic,
        ];
    }
}