<?php


namespace Afiqiqmal\HuaweiPush\Structure\Common;


use Afiqiqmal\HuaweiPush\Helper\ArrayHelper;
use Afiqiqmal\HuaweiPush\Structure\Validation\Extras;

class LightSetting implements Extras
{
    /**
     * Breathing light color. This parameter is mandatory when light_settings is set.
     *
     * @var array
     */
    protected $color = [
        'alpha' => 1,
        'red' => 1,
        'green' => 0,
        'blue' => 0
    ];

    /**
     * Interval when a breathing light is on, in the format of \d+|\d+[sS]|\d+.\d{1,9}|\d+.\d{1,9}[sS]. This parameter is mandatory when light_settings is set.
     *
     * @var string
     */
    protected $light_on_duration;

    /**
     * Interval when a breathing light is off, in the format of \d+|\d+[sS]|\d+.\d{1,9}|\d+.\d{1,9}[sS]. This parameter is mandatory when light_settings is set.
     *
     * @var string
     */
    protected $light_off_duration;

    /**
     * @param int $alpha the value range is [0,1].
     * @param int $red the value range is [0,1].
     * @param int $green the value range is [0,1].
     * @param int $blue the value range is [0,1].
     * @return LightSetting
     */
    public function setColor($alpha = 1, $red = 1, $green = 0, $blue = 0): LightSetting
    {
        $this->color = [
            'alpha' => $alpha,
            'red' => $red,
            'green' => $green,
            'blue' => $blue
        ];

        return $this;
    }

    /**
     * @param string $light_on_duration
     * @return LightSetting
     */
    public function setLightOnDuration(string $light_on_duration): LightSetting
    {
        $this->light_on_duration = $light_on_duration;
        return $this;
    }

    /**
     * @param string $light_off_duration
     * @return LightSetting
     */
    public function setLightOffDuration(string $light_off_duration): LightSetting
    {
        $this->light_off_duration = $light_off_duration;
        return $this;
    }

    public function toArray()
    {
        $this->validate();

        return ArrayHelper::filter([
            'color' => $this->color,
            'light_on_duration' => $this->light_on_duration,
            'light_off_duration' => $this->light_off_duration
        ]);
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }
}