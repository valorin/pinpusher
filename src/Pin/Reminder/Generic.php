<?php
namespace Valorin\PinPusher\Pin\Reminder;

use Valorin\PinPusher\Pin;
use Valorin\PinPusher\Pin\Layout\Base;

class Generic extends Base
{
    /**
     * @var string
     */
    protected $type = 'genericReminder';

    /**
     * @var string
     */
    protected $locationName;

    /**
     * @var
     */
    private $time;

    /**
     * @param $time
     * @param $title
     * @param $tinyIcon
     */
    public function __construct($time, $title, $tinyIcon)
    {
        $this->title    = $title;
        $this->tinyIcon = $tinyIcon;
        $this->time     = $time;
    }

    /**
     * @param string $locationName
     *
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;

        return $this;
    }

    /**
     * @return array
     */
    public function generate()
    {
        return [
            'time'   => $this->time->format(Pin::TIME_FORMAT),
            'layout' => parent::generate(),
        ];
    }
}
