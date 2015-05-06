<?php
namespace Valorin\PinPusher\Pin\Reminder;

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
     * @param $title
     * @param $tinyIcon
     */
    public function __construct($title, $tinyIcon)
    {
        $this->title = $title;
        $this->tinyIcon = $tinyIcon;
    }

    /**
     * @param string $locationName
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;

        return $this;
    }
}
