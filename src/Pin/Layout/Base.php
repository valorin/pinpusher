<?php
namespace Valorin\PinPusher\Pin\Layout;

use Valorin\PinPusher\Generator;

abstract class Base
{
    use Generator;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $shortTitle;

    /**
     * @var string
     */
    protected $subtitle;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $tinyIcon;

    /**
     * @var string
     */
    protected $smallIcon;

    /**
     * @var string
     */
    protected $largeIcon;

    /**
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $shortTitle
     * @return self
     */
    public function setShortTitle($shortTitle)
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    /**
     * @param string $subtitle
     * @return self
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @param string $body
     * @return self
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string $tinyIcon
     * @return self
     */
    public function setTinyIcon($tinyIcon)
    {
        $this->tinyIcon = $tinyIcon;

        return $this;
    }

    /**
     * @param string $smallIcon
     * @return self
     */
    public function setSmallIcon($smallIcon)
    {
        $this->smallIcon = $smallIcon;

        return $this;
    }

    /**
     * @param string $largeIcon
     * @return self
     */
    public function setLargeIcon($largeIcon)
    {
        $this->largeIcon = $largeIcon;

        return $this;
    }

    /**
     * @return array
     * @throws TypeRequiredException
     */
    protected function fields()
    {
        if (empty($this->type)) {
            throw new TypeRequiredException(__CLASS__);
        }

        return ['type', 'title', 'shortTitle', 'subtitle', 'body', 'tinyIcon', 'smallIcon', 'largeIcon'];
    }
}
