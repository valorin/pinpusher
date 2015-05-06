<?php
namespace Valorin\PinPusher\Pin\Notification;

use Valorin\PinPusher\Pin\Layout\Base;

class Generic extends Base
{
    /**
     * @var string
     */
    protected $type = 'genericNotification';

    /**
     * @param $title
     * @param $tinyIcon
     */
    public function __construct($title, $tinyIcon)
    {
        $this->title = $title;
        $this->tinyIcon = $tinyIcon;
    }
}
