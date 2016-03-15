<?php
namespace Valorin\PinPusher\Pin\Reminder;

use DateTime;
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
     * @var DateTime
     */
    private $time;

    /**
     * @param DateTime $time
     * @param string   $title
     * @param string   $tinyIcon
     */
    public function __construct(DateTime $time, $title, $tinyIcon)
    {
        $this->title    = $title;
        $this->tinyIcon = $tinyIcon;
        $this->time     = clone $time;
    }

    /**
     * @param string $locationName
     *
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = str_limit($locationName, 256);

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
