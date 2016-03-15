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
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var string
     */
    protected $primaryColor;

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
    public function setTime(DateTime $time)
    {
        $this->time = $time->copy();

        return $this;
    }

    /**
     * @param string $backgroundColor
     *
     * @return self
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * @param string $primaryColor
     *
     * @return self
     */
    public function setPrimaryColor($primaryColor)
    {
        $this->primaryColor = $primaryColor;

        return $this;
    }

    /**
     * @return array
     */
    public function generate()
    {
        if ($this->time) {
            $data = [
                'time'   => $this->time->format(Pin::TIME_FORMAT),
                'layout' => parent::generate(),
            ];

            unset($data['layout']['time']);

            return $data;
        }

        return [
            'layout' => parent::generate(),
        ];
    }
}
