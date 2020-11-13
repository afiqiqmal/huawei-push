<?php


namespace Afiqiqmal\HuaweiPush\Structure\Common;


use Afiqiqmal\HuaweiPush\Helper\ArrayHelper;
use Afiqiqmal\HuaweiPush\Structure\Validation\Extras;

class Button implements Extras
{
    /**
     * Button name, which is mandatory and cannot exceed 40 characters.
     *
     * @var string
     */
    private $name;

    /**
     * Button action
     * 0: Open the app home page
     * 1: Open a custom app page
     * 2: Open a specified web page
     * 3: Delete a notification message
     * 4: Share a notification message
     *
     * @var integer
     */
    private $action_type = 0;

    /**
     * Method of opening a custom app page. The options are as follows:
     * 0: Open the page through intent
     * 1: Open the page through action
     * This parameter is mandatory when action_type is set to 1.
     *
     * @var integer
     */
    private $intent_type;

    /**
     * When action_type is set to 1, set this parameter to an action or the URI of the app page to be opened based on the value of intent_type.
     * When action_type is set to 2, set this parameter to the URL of the web page to be opened. The URL must be an HTTPS URL.
     *d
     * @var string
     */
    private $intent;

    /**
     * The maximum length is 1024 characters.
     * When action_type is set to 0 or 1, this parameter is used to transparently transmit data to an app after a button is tapped
     * The parameter is optional and its value must be key-value pairs in format of {"key1":"value1","key2":"value2",...}.
     * When action_type is set to 4, this parameter indicates content to be shared and is mandatory
     *
     * @var array
     */
    private $data;


    /**
     * @return Button
     */
    public static function make()
    {
        return new self();
    }


    /**
     * @param string $name
     * @return Button
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $action_type
     * @return Button
     */
    public function setActionType(int $action_type)
    {
        $this->action_type = $action_type;
        return $this;
    }

    /**
     * @param int $intent_type
     * @return Button
     */
    public function setIntentType(int $intent_type)
    {
        $this->intent_type = $intent_type;
        return $this;
    }

    /**
     * @param string $intent
     * @return Button
     */
    public function setIntent(string $intent)
    {
        $this->intent = $intent;
        return $this;
    }

    /**
     * @param array $data
     * @return Button
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }
    

    public function toArray()
    {
        $this->validate();

        return ArrayHelper::filter([
            'name' => $this->name,
            'action_type' => $this->action_type,
            'intent_type' => $this->intent_type,
            'intent' => $this->intent,
            'data' => $this->data ? json_encode($this->data) : null,
        ]);
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }
}