<?php
namespace Valorin\PinPusher\Pin;

use DateTime;
use Valorin\PinPusher\Generator;
use Valorin\PinPusher\Pin\Notification\Generic;

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
     * @param \Valorin\PinPusher\Pin\Notification\Generic $layout
     */
    public function __construct(Generic $layout)
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
