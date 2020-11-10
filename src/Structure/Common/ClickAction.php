<?php


namespace Afiqiqmal\HuaweiPush\Structure\Common;


use Afiqiqmal\HuaweiPush\Structure\Validation\Extras;

class ClickAction implements Extras
{
    /**
     * Message tapping action type
     * 1 - tap to open a custom app page
     * 2 - tap to open a specified URL
     * 3 - tap to start the app
     *
     * @var integer
     */
    protected $type = 3;

    /**
     * For details about intent implementation, please refer to setting the intent parameter.
     * When type is set to 1, you must set at least one of intent and action.
     *
     * @var string
     */
    protected $intent;

    /**
     * URL to be opened. The URL must be an HTTPS URL
     * This parameter is mandatory when type is set to 2.
     *
     * @var string
     */
    protected $url;

    /**
     * Action corresponding to the activity of the page to be opened when the custom app page is opened through the action.
     * When type is set to 1, you must set at least one of intent and action.
     *
     * @var string
     */
    protected $action;

    /**
     * @return ClickAction
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param int $type
     * @return ClickAction
     */
    public function setType(int $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $intent
     * @return ClickAction
     */
    public function setIntent(string $intent)
    {
        $this->intent = $intent;
        return $this;
    }

    /**
     * @param string $url
     * @return ClickAction
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $action
     * @return ClickAction
     */
    public function setAction(string $action)
    {
        $this->action = $action;
        return $this;
    }

    public function toArray()
    {
        $this->validate();

        return [
            'type' => $this->type,
            'intent' => $this->intent,
            'url' => $this->url,
            'action' => $this->action,
        ];
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }
}