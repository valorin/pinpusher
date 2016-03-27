<?php
namespace Valorin\PinPusher\Pin\Layout;

class Calendar extends Generic
{
    /**
     * @var string
     */
    protected $type = 'calendarPin';

    /**
     * @var string
     */
    protected $locationName;

    /**
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $locationName
     *
     * @return self
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $this->truncate($locationName);

        return $this;
    }
}
