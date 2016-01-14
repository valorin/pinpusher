<?php
namespace Valorin\PinPusher\Pin\Layout;

class Weather extends Generic
{
    /**
     * @var string
     */
    protected $type = 'weatherPin';

    /**
     * @var string
     */
    protected $locationName;

    /**
     * @var string
     */
    protected $displayTime;

    /**
     * @param string $title
     * @param string $tinyIcon
     * @param string $largeIcon
     * @param string $locationName
     */
    public function __construct($title, $tinyIcon, $largeIcon, $locationName)
    {
        $this->title        = $title;
        $this->tinyIcon     = $tinyIcon;
        $this->largeIcon    = $largeIcon;
        $this->locationName = str_limit($locationName, 256);
    }

    public function setDisplayTime($displayTime)
    {
        $this->displayTime = $displayTime;

        return $this;
    }
}
