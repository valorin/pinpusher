<?php
namespace Valorin\PinPusher\Pin\Action;

class OpenWatchApp extends Base
{
    /**
     * @var string
     */
    protected $type = 'openWatchApp';

    /**
     * @var int
     */
    protected $launchCode;

    /**
     * @param string $title
     * @param int    $launchCode
     */
    public function __construct($title, $launchCode)
    {
        $this->title      = $title;
        $this->launchCode = $launchCode;
    }
}
