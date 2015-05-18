<?php
namespace Valorin\PinPusher\Pin\Notification;

use DateTime;
use Valorin\PinPusher\Pin;
use Valorin\PinPusher\Pin\Layout\Base;

class Generic extends Base
{
    /**
     * @var string
     */
    protected $type = 'genericNotification';

    /**
     * @var DateTime
     */
    protected $time;

    /**
     * @param $title
     * @param $tinyIcon
     */
    public function __construct($title, $tinyIcon)
    {
        $this->title    = $title;
        $this->tinyIcon = $tinyIcon;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     *
     * @return self
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return array
     */
    public function generate()
    {
        if ($this->time) {
            return [
                'time'   => $this->time->format(Pin::TIME_FORMAT),
                'layout' => parent::generate(),
            ];
        }

        return [
            'layout' => parent::generate(),
        ];
    }
}
