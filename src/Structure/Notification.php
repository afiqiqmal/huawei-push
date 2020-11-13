<?php


namespace Afiqiqmal\HuaweiPush\Structure;


use Afiqiqmal\HuaweiPush\Helper\ArrayHelper;

class Notification
{
    /**
     * Notification message title.
     *
     * @var string
     */
    private $title;

    /**
     * Notification message content.
     *
     * @var string
     */
    private $body;

    /**
     * URL of the custom large icon on the right of a notification message.
     * If this parameter is not set, the icon is not displayed.
     * The URL must be an HTTPS URL.
     *
     * @var string
     */
    private $image;


    /**
     * @return Notification
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param string $title
     *
     * @return Notification
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $body
     *
     * @return Notification
     */
    public function setBody(string $body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param string $image
     *
     * @return Notification
     */
    public function setImage(string $image)
    {
        $this->image = $image;
        return $this;
    }

    
    public function toArray()
    {
        return ArrayHelper::filter([
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
        ]);
    }
}