<?php
namespace Valorin\PinPusher\Pin\Layout;

class Sports extends Generic
{
    const INGAME = 'in-game';
    const PREGAME = 'pre-game';

    /**
     * @var string
     */
    protected $type = 'sportsPin';

    /**
     * @var string
     */
    protected $rankAway;

    /**
     * @var string
     */
    protected $rankHome;

    /**
     * @var string
     */
    protected $nameAway;

    /**
     * @var string
     */
    protected $nameHome;

    /**
     * @var string
     */
    protected $recordAway;

    /**
     * @var string
     */
    protected $recordHome;

    /**
     * @var string
     */
    protected $scoreAway;

    /**
     * @var string
     */
    protected $scoreHome;

    /**
     * @var string
     */
    protected $sportsGameState;

    /**
     * @param string $title
     * @param string $tinyIcon
     * @param string $largeIcon
     */
    public function __construct($title, $tinyIcon, $largeIcon)
    {
        $this->title     = $title;
        $this->tinyIcon  = $tinyIcon;
        $this->largeIcon = $largeIcon;
    }

    /**
     * @param string $rankAway
     *
     * @return self
     */
    public function setRankAway($rankAway)
    {
        $this->rankAway = $rankAway;

        return $this;
    }

    /**
     * @param string $rankHome
     *
     * @return self
     */
    public function setRankHome($rankHome)
    {
        $this->rankHome = $rankHome;

        return $this;
    }

    /**
     * @param string $nameAway
     *
     * @return self
     */
    public function setNameAway($nameAway)
    {
        $this->nameAway = $nameAway;

        return $this;
    }

    /**
     * @param string $nameHome
     *
     * @return self
     */
    public function setNameHome($nameHome)
    {
        $this->nameHome = $nameHome;

        return $this;
    }

    /**
     * @param string $recordAway
     *
     * @return self
     */
    public function setRecordAway($recordAway)
    {
        $this->recordAway = $recordAway;

        return $this;
    }

    /**
     * @param string $recordHome
     *
     * @return self
     */
    public function setRecordHome($recordHome)
    {
        $this->recordHome = $recordHome;

        return $this;
    }

    /**
     * @param string $scoreAway
     *
     * @return self
     */
    public function setScoreAway($scoreAway)
    {
        $this->scoreAway = $scoreAway;

        return $this;
    }

    /**
     * @param string $scoreHome
     *
     * @return self
     */
    public function setScoreHome($scoreHome)
    {
        $this->scoreHome = $scoreHome;

        return $this;
    }

    /**
     * @param string $sportsGameState
     *
     * @return self
     */
    public function setSportsGameState($sportsGameState)
    {
        $this->sportsGameState = $sportsGameState;

        return $this;
    }
}
