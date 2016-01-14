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
     * @var string
     */
    protected $primaryColor;

    /**
     * @var string
     */
    protected $secondaryColor;

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
     * @var string
     */
    protected $shortSubtitle;

    /**
     * @param string $title
     * @param string $tinyIcon
     */
    public function __construct($title, $tinyIcon)
    {
        $this->title    = $title;
        $this->tinyIcon = $tinyIcon;
    }

    /**
     * @param string $foregroundColor
     *
     * @return self
     */
    public function setForegroundColor($foregroundColor)
    {
        $this->foregroundColor = $foregroundColor;

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
     * @param array $headings
     *
     * @return self
     */
    public function setHeadings(array $headings)
    {
        $this->headings = $headings;

        return $this;
    }

    /**
     * @param array $paragraphs
     *
     * @return self
     */
    public function setParagraphs(array $paragraphs)
    {
        $this->paragraphs = $paragraphs;

        return $this;
    }

    /**
     * @param DateTime $lastUpdated
     *
     * @return self
     */
    public function setLastUpdated(DateTime $lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

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
     * @param string $secondaryColor
     *
     * @return self
     */
    public function setSecondaryColor($secondaryColor)
    {
        $this->secondaryColor = $secondaryColor;

        return $this;
    }

    /**
     * @param string $shortSubtitle
     *
     * @return self
     */
    public function setShortSubtitle($shortSubtitle)
    {
        $this->shortSubtitle = $shortSubtitle;

        return $this;
    }
}
