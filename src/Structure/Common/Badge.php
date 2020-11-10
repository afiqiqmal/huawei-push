<?php


namespace Afiqiqmal\HuaweiPush\Structure\Common;


use Afiqiqmal\HuaweiPush\Exception\HuaweiException;
use Afiqiqmal\HuaweiPush\Structure\Validation\Extras;

class Badge implements Extras
{
    /**
     * Accumulative badge number, which is an integer ranging from 1 to 99.
     *
     * @var integer
     */
    protected $add_num;

    /**
     * Full path of the app entry activity class
     *
     * @var string
     */
    protected $class;

    /**
     * Set badge number, which is an integer ranging from 0 to 99. If both set_num and add_num are set, the value of set_num prevails.
     *
     * @var integer
     */
    protected $set_num;


    /**
     * @return Badge
     */
    public static function make()
    {
        return new self();
    }

    /**
     * @param int $add_num
     * @return Badge
     */
    public function setAddNum(int $add_num): Badge
    {
        $this->add_num = $add_num;
        return $this;
    }

    /**
     * @param string $class
     * @return Badge
     */
    public function setClass(string $class): Badge
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @param int $set_num
     * @return Badge
     */
    public function setSetNum(int $set_num): Badge
    {
        $this->set_num = $set_num;
        return $this;
    }

    public function toArray()
    {
        $this->validate();

        return [
            'add_num' => $this->add_num,
            'class' => $this->add_num,
            'set_num' => $this->set_num,
        ];
    }

    public function validate()
    {
        if ($this->set_num && !in_array($this->set_num, range(0, 99))) {
            throw new HuaweiException('Set badge number need integer ranging from 0 to 99 only');
        }

        if ($this->add_num && !in_array($this->add_num, range(1, 99))) {
            throw new HuaweiException('Accumulative badge number need integer ranging from 1 to 99 only');
        }
    }

}