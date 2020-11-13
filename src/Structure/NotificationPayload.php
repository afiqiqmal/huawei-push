<?php


namespace Afiqiqmal\HuaweiPush\Structure;


use Afiqiqmal\HuaweiPush\Helper\ArrayHelper;

class NotificationPayload
{
    /**
     * @var bool
     */
    protected $validate_only = false;

    /**
     * @var Message
     */
    protected $message;

    /**
     * @return NotificationPayload
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param bool $validate_only
     * @return NotificationPayload
     */
    public function setValidateOnly(bool $validate_only): NotificationPayload
    {
        $this->validate_only = $validate_only;
        return $this;
    }

    /**
     * @param Message $message
     * @return NotificationPayload
     */
    public function setMessage(Message $message): NotificationPayload
    {
        $this->message = $message;
        return $this;
    }

    public function toArray()
    {
        return ArrayHelper::filter([
            'validate_only' => $this->validate_only,
            'message' => $this->message->toArray() ?? null
        ]);
    }
}