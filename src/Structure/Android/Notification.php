<?php


namespace Afiqiqmal\HuaweiPush\Structure\Android;


use Afiqiqmal\HuaweiPush\Structure\Common\Badge;
use Afiqiqmal\HuaweiPush\Structure\Common\Button;
use Afiqiqmal\HuaweiPush\Structure\Common\ClickAction;
use Afiqiqmal\HuaweiPush\Structure\Common\LightSetting;
use Afiqiqmal\HuaweiPush\Structure\Validation\Extras;
use DateTimeInterface;

class Notification implements Extras
{
    /**
     * Title of an Android notification message.
     * If the title parameter is set, the value of the message.notification.title field is overwritten.
     * Before a message is sent, you must set at least one of title and message.notification.title.
     *
     * @var string
     */
    protected $title;

    /**
     * Body of an Android notification message.
     * If the body parameter is set, the value of the message.notification.body field is overwritten.
     * Before a message is sent, you must set at least one of body and message.notification.body
     *
     * @var string
     */
    protected $body;

    /**
     * Custom small icon on the left of a notification message.
     * The icon file must be stored in the /res/raw directory of an app.
     * For example, the value /raw/ic_launcher indicates the local icon file ic_launcher.xxx stored in /res/raw
     *
     * @var string
     */
    protected $icon;

    /**
     * Custom notification bar button color in #RRGGBB format,
     * where RR indicates the red hexadecimal color,
     * GG indicates the green hexadecimal color, and
     * BB indicates the blue hexadecimal color. Example: #FFEEFF
     *
     * @var string
     */
    protected $color;

    /**
     * Custom message notification ringtone, which is valid during channel creation.
     * The ringtone file must be stored in the /res/raw directory of an app.
     * For example, the value /raw/shake indicates the local ringtone file /res/raw/shake.xxx stored in /res/raw. Currently, various file formats such as MP3, WAV, and MPEG are supported.
     * If this parameter is not set, the default system ringtone will be used.
     *
     * @var string
     */
    protected $sound;

    /**
     * Indicates whether to use the default ringtone
     *
     * @var boolean
     */
    protected $default_sound = false;

    /**
     * Android notification message priority, which determines the message notification behavior of a user device.
     * 1- LOW,
     * 2- NORMAL
     *
     * @var int
     */
    protected $priority;

    /**
     * Message tag. Messages that use the same message tag in the same app will be overwritten by the latest message.
     *
     * @var string
     */
    protected $tag;

    /**
     * Custom channel for displaying notification messages.
     * Custom channels are supported in the Android O version or later.
     *
     * @var string
     */
    protected $channel_id;

    /**
     * Custom channel for displaying notification messages. Custom channels are supported in the Android O version or later.
     * @link https://developer.huawei.com/consumer/en/doc/development/HMSCore-Guides-V5/android-noti-local-0000001050042073-V5
     *
     * @var string
     */
    protected $body_loc_key;

    /**
     * Variable parameter of the localized message body
     * @link https://developer.huawei.com/consumer/en/doc/development/HMSCore-Guides-V5/android-noti-local-0000001050042073-V5
     *
     * @var array
     */
    protected $body_loc_args;

    /**
     * ID in a string format of the localized message title.
     * @link https://developer.huawei.com/consumer/en/doc/development/HMSCore-Guides-V5/android-noti-local-0000001050042073-V5
     *
     * @var string
     */
    protected $title_loc_key;

    /**
     * Variable parameter of the localized message title
     * @link https://developer.huawei.com/consumer/en/doc/development/HMSCore-Guides-V5/android-noti-local-0000001050042073-V5
     *
     * @var array
     */
    protected $title_loc_args;

    /**
     * Brief description of a notification message to an Android app.
     *
     * @var string
     */
    protected $summary;

    /**
     * URL of the custom large icon on the right of a notification message.
     * The function is the same as that of the message.notification.image field.
     * If the image parameter is set, the value of the message.notification.image field is overwritten.
     * The URL must be an HTTPS URL.
     *
     * @var string
     */
    protected $image;

    /**
     * Notification bar style.
     * 0 - default
     * 1 - large text
     * 2 - inbox style
     *
     * @var int
     */
    protected $style = 0;


    /**
     * Android notification message title in large text style.
     * This parameter is mandatory when style is set to 1.
     * When the notification bar is displayed after big_title is set, big_title instead of title is used.
     *
     * @var string
     */
    protected $big_title;

    /**
     * Android notification message body in large text style.
     * This parameter is mandatory when style is set to 1.
     * When the notification bar is displayed after big_body is set, big_body instead of body is used.
     *
     * @var string
     */
    protected $big_body;

    /**
     * Message display duration, in milliseconds.
     * Messages are automatically deleted after the duration expires.
     *
     * @var integer
     */
    protected $auto_clear;

    /**
     * Unique notification ID of a message.
     * If a message does not contain the ID or the ID is -1,
     * NC will generate a unique ID for the message.
     * Different notification messages can use the same notification ID, so that new messages can overwrite old messages.
     *
     * @var integer
     */
    protected $notify_id;

    /**
     * Message group.
     * For example, if 10 messages are sent and the group parameter of the messages is set to 10,
     * only one message is displayed in the notification bar of the mobile phone.
     *
     * @var string
     */
    protected $group;

    /**
     * Android notification message badge control.
     *
     * @var Badge
     */
    protected $badge;

    /**
     * Content displayed on the status bar after the device receives a notification message.
     * Due to the restrictions of the Android native mechanism,
     * the content will not be displayed on the status bar on the device running Android 5.0 (API level 21) or later even if this field is set.
     *
     * @var string
     */
    protected $ticker;

    /**
     * Indicates whether a message is removed from the NC after a user taps the message
     *
     * @var boolean
     */
    protected $auto_cancel = true;

    /**
     * Message sorting time.
     * Android notification messages are sorted based on this value.
     * This time is displayed in the notification bar after being converted.
     *
     * @var DateTimeInterface
     */
    protected $when;

    /**
     * Indicates whether to use the default vibration mode.
     *
     * @var boolean
     */
    protected $use_default_vibrate;

    /**
     * Indicates whether to use the default breathing light mode.
     *
     * @var boolean
     */
    protected $use_default_light;

    /**
     * Custom vibration mode for an Android notification message.
     * Each array element adopts the format of [0-9]+|[0-9]+[sS]|[0-9]+[.][0-9]{1,9}|[0-9]+[.][0-9]{1,9}[sS], for example, ["3.5S","2S","1S","1.5S"].
     * A maximum of ten array elements are supported. The value of each element is an integer ranging from 0 to 60. EMUI 11 is not supported.
     *
     * @var array
     */
    protected $vibrate_config;

    /**
     * Android notification message visibility
     * 1 => 'VISIBILITY_UNSPECIFIED'
     * 2 => 'PRIVATE'
     * 3 => 'PUBLIC'
     * 4 => 'SECRET'
     *
     * @var integer
     */
    protected $visibility = 3;

    /**
     * Custom breathing light mode
     *
     * @var LightSetting
     */
    protected $light_settings;

    /**
     * Indicates whether to display notification messages in the foreground when an app is running in the foreground.
     *
     * @var boolean
     */
    protected $foreground_show;

    /**
     * ID of the user-app relationship. The value contains a maximum of 64 characters.
     *
     * @var string
     */
    protected $profile_id;

    /**
     * Content in inbox style.
     * A maximum number of five content records are supported and each record can contain at most 1024 characters.
     * This parameter is mandatory when style is set to 3
     *
     * @var array
     */
    protected $inbox_content;


    /**
     * Action buttons of a notification message. A maximum of three buttons can be set
     *
     * @var Button[]
     */
    protected $buttons;

    /**
     * Message tapping action.
     *
     * @var ClickAction
     */
    protected $click_action;


    /**
     * @var string[]
     */
    public static $priorityName = [
        1 => 'LOW',
        2 => 'NORMAL',
        3 => 'HIGH',
    ];

    /**
     * @var string[]
     */
    public static $visibilityName = [
        1 => 'VISIBILITY_UNSPECIFIED',
        2 => 'PRIVATE',
        3 => 'PUBLIC',
        4 => 'SECRET',
    ];


    /**
     * @return Notification
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param string $title
     * @return Notification
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $body
     * @return Notification
     */
    public function setBody(string $body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param string $icon
     * @return Notification
     */
    public function setIcon(string $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param string $color
     * @return Notification
     */
    public function setColor(string $color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param string $sound
     * @return Notification
     */
    public function setSound(string $sound)
    {
        $this->sound = $sound;
        return $this;
    }

    /**
     * @param bool $default_sound
     * @return Notification
     */
    public function setDefaultSound(bool $default_sound)
    {
        $this->default_sound = $default_sound;
        return $this;
    }

    /**
     * @param int $priority
     * @return Notification
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @param string $tag
     * @return Notification
     */
    public function setTag(string $tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @param string $channel_id
     * @return Notification
     */
    public function setChannelId(string $channel_id)
    {
        $this->channel_id = $channel_id;
        return $this;
    }

    /**
     * @param string $body_loc_key
     * @return Notification
     */
    public function setBodyLocKey(string $body_loc_key)
    {
        $this->body_loc_key = $body_loc_key;
        return $this;
    }

    /**
     * @param array $body_loc_args
     * @return Notification
     */
    public function setBodyLocArgs(array $body_loc_args)
    {
        $this->body_loc_args = $body_loc_args;
        return $this;
    }

    /**
     * @param string $title_loc_key
     * @return Notification
     */
    public function setTitleLocKey(string $title_loc_key)
    {
        $this->title_loc_key = $title_loc_key;
        return $this;
    }

    /**
     * @param array $title_loc_args
     * @return Notification
     */
    public function setTitleLocArgs(array $title_loc_args)
    {
        $this->title_loc_args = $title_loc_args;
        return $this;
    }

    /**
     * @param string $summary
     * @return Notification
     */
    public function setSummary(string $summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @param string $image
     * @return Notification
     */
    public function setImage(string $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param int $style
     * @return Notification
     */
    public function setStyle(int $style)
    {
        $this->style = $style;
        return $this;
    }

    /**
     * @param string $big_title
     * @return Notification
     */
    public function setBigTitle(string $big_title)
    {
        $this->big_title = $big_title;
        return $this;
    }

    /**
     * @param string $big_body
     * @return Notification
     */
    public function setBigBody(string $big_body)
    {
        $this->big_body = $big_body;
        return $this;
    }

    /**
     * @param int $auto_clear
     * @return Notification
     */
    public function setAutoClear(int $auto_clear)
    {
        $this->auto_clear = $auto_clear;
        return $this;
    }

    /**
     * @param int $notify_id
     * @return Notification
     */
    public function setNotifyId(int $notify_id)
    {
        $this->notify_id = $notify_id;
        return $this;
    }

    /**
     * @param string $group
     * @return Notification
     */
    public function setGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @param Badge $badge
     * @return Notification
     */
    public function setBadge(Badge $badge)
    {
        $this->badge = $badge;
        return $this;
    }

    /**
     * @param string $ticker
     * @return Notification
     */
    public function setTicker(string $ticker)
    {
        $this->ticker = $ticker;
        return $this;
    }

    /**
     * @param bool $auto_cancel
     * @return Notification
     */
    public function setAutoCancel(bool $auto_cancel)
    {
        $this->auto_cancel = $auto_cancel;
        return $this;
    }

    /**
     * @param DateTimeInterface $when
     * @return Notification
     */
    public function setWhen(DateTimeInterface $when)
    {
        $this->when = $when;
        return $this;
    }

    /**
     * @param bool $use_default_vibrate
     * @return Notification
     */
    public function setUseDefaultVibrate(bool $use_default_vibrate)
    {
        $this->use_default_vibrate = $use_default_vibrate;
        return $this;
    }

    /**
     * @param bool $use_default_light
     * @return Notification
     */
    public function setUseDefaultLight(bool $use_default_light)
    {
        $this->use_default_light = $use_default_light;
        return $this;
    }

    /**
     * @param array $vibrate_config
     * @return Notification
     */
    public function setVibrateConfig(array $vibrate_config)
    {
        $this->vibrate_config = $vibrate_config;
        return $this;
    }

    /**
     * @param int $visibility
     * @return Notification
     */
    public function setVisibility(int $visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * @param LightSetting $light_settings
     * @return Notification
     */
    public function setLightSettings(LightSetting $light_settings)
    {
        $this->light_settings = $light_settings;
        return $this;
    }

    /**
     * @param bool $foreground_show
     * @return Notification
     */
    public function setForegroundShow(bool $foreground_show)
    {
        $this->foreground_show = $foreground_show;
        return $this;
    }

    /**
     * @param string $profile_id
     * @return Notification
     */
    public function setProfileId(string $profile_id)
    {
        $this->profile_id = $profile_id;
        return $this;
    }

    /**
     * @param array $inbox_content
     * @return Notification
     */
    public function setInboxContent(array $inbox_content)
    {
        $this->inbox_content = $inbox_content;
        return $this;
    }

    /**
     * @param Button[] $buttons
     * @return Notification
     */
    public function setButtons(array $buttons)
    {
        $this->buttons = $buttons;
        return $this;
    }

    /**
     * @param ClickAction $click_action
     * @return Notification
     */
    public function setClickAction(ClickAction $click_action)
    {
        $this->click_action = $click_action;
        return $this;
    }


    public function toArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'icon' => $this->icon,
            'color' => $this->color,
            'sound' => $this->sound,
            'default_sound' => $this->default_sound,
            'tag' => $this->tag,
            'click_action' => $this->click_action ? $this->click_action->toArray() : null,
            'body_loc_key' => $this->body_loc_key,
            'body_loc_args' => $this->body_loc_args,
            'title_loc_key' => $this->title_loc_key,
            'title_loc_args' => $this->title_loc_args,
            'channel_id' => $this->channel_id,
            'notify_summary' => $this->summary,
            'image' => $this->image,
            'style' => $this->style,
            'big_title' => $this->big_title,
            'big_body' => $this->big_body,
            'auto_clear' => $this->auto_clear,
            'notify_id' => $this->notify_id,
            'group' => $this->group,
            'badge' => $this->badge ? $this->badge->toArray() : null,
            'ticker' => $this->ticker,
            'auto_cancel' => $this->auto_cancel,
            'when' => $this->when ? $this->when->format('Y-m-d\TH:i:s\Z') : null,
            'importance' => self::$priorityName[$this->priority],
            'use_default_vibrate' => $this->use_default_vibrate,
            'use_default_light' => $this->use_default_light,
            'vibrate_config' => $this->vibrate_config,
            'visibility' => self::$visibilityName[$this->visibility],
            'light_settings' => $this->light_settings ? $this->light_settings->toArray() : null,
            'foreground_show' => $this->foreground_show,
            'profile_id' => $this->profile_id,
            'inbox_content' => $this->inbox_content,
            'buttons' => collect($this->buttons)->map(function ($item) {
                return $item->toArray();
            })->toArray()
        ];
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }
}