<?php
namespace Valorin\PinPusher\Pin\Layout;

use DateTime;

class Generic extends Base
{
    /**
     * @var string
     */
    protected $type = 'genericPin';

    /**
     * @var string
     */
    protected $foregroundColor;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var array
     */
    protected $headings;

    /**
     * @var array
     */
    protected $paragraphs;

    /**
     * @var DateTime
     */
    protected $lastUpdated;

    /**
     * @param string $title
     * @param string $tinyIcon
     */
    public function __construct($title, $tinyIcon)
    {
        $this->title = $title;
        $this->tinyIcon = $tinyIcon;
    }

    /**
     * @param string $foregroundColor
     * @return self
     */
    public function setForegroundColor($foregroundColor)
    {
        $this->foregroundColor = $foregroundColor;

        return $this;
    }

    /**
     * @param string $backgroundColor
     * @return self
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * @param array $headings
     * @return self
     */
    public function setHeadings(array $headings)
    {
        $this->headings = $headings;

        return $this;
    }

    /**
     * @param array $paragraphs
     * @return self
     */
    public function setParagraphs(array $paragraphs)
    {
        $this->paragraphs = $paragraphs;

        return $this;
    }

    /**
     * @param DateTime $lastUpdated
     * @return self
     */
    public function setLastUpdated(DateTime $lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }
}
