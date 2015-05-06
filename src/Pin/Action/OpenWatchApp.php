<?php
namespace Valorin\PinPusher\Pin\Action;

class OpenWatchApp extends Base
{
    /**
     * @var string
     */
    protected $type = 'openWatchApp';

    /**
     * @var string
     */
    private $launchCode;

    /**
     * @param string $title
     * @param string $launchCode
     */
    public function __construct($title, $launchCode)
    {
        $this->title = $title;
        $this->launchCode = $launchCode;
    }
}
