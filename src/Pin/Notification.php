<?php
namespace Valorin\PinPusher\Pin;

use DateTime;
use Valorin\PinPusher\Generator;
use Valorin\PinPusher\Pin\Layout\Base;

class Notification
{
    use Generator;

    /**
     * @var Base
     */
    protected $layout;

    /**
     * @var DateTime
     */
    protected $time;

    /**
     * @param Base $layout
     */
    public function __construct(Base $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param DateTime $time
     * @return self
     */
    public function setTime(DateTime $time)
    {
        $this->time = $time;

        return $this;
    }

    protected function fields()
    {
        return ['layout', 'time'];
    }
}
