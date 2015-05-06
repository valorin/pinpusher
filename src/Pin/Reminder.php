<?php
namespace Valorin\PinPusher\Pin;

use DateTime;
use Valorin\PinPusher\Generator;
use Valorin\PinPusher\Pin\Reminder\Generic;

class Reminder
{
    use Generator;

    /**
     * @var Generic
     */
    protected $layout;

    /**
     * @var DateTime
     */
    protected $time;

    /**
     * @param Generic $layout
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
