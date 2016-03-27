<?php
namespace tests\Pin\Layout;

use Valorin\PinPusher\Pin\Icon;
use Valorin\PinPusher\Pin\Layout\Sports;

class SportsTest extends \PHPUnit_Framework_TestCase
{
    public function test_defaults()
    {
        $layout = (new Sports('sports title', Icon::HOCKEY_GAME, Icon::CRICKET_GAME))->generate();

        $this->assertArrayHasKey('type', $layout);
        $this->assertArrayHasKey('title', $layout);
        $this->assertArrayHasKey('tinyIcon', $layout);
        $this->assertArrayHasKey('largeIcon', $layout);

        $this->assertEquals('sportsPin', $layout['type']);
        $this->assertEquals('sports title', $layout['title']);
        $this->assertEquals(Icon::HOCKEY_GAME, $layout['tinyIcon']);
        $this->assertEquals(Icon::CRICKET_GAME, $layout['largeIcon']);
    }

    /**
     * We cast scores as strings as the Pebble API is VERY strict and 
     * does not accept integer score values... for some weird reason.
     */
    public function test_cast_scores_as_strings()
    {
        $action = (new Sports('title', Icon::SOCCER_GAME, Icon::CRICKET_GAME))
            ->setRankAway(1)
            ->setRankHome(2)
            ->setRecordAway(3)
            ->setRecordHome(4)
            ->setScoreAway(5)
            ->setScoreHome(6);
        $generated = $action->generate();

        $this->assertSame('1', $generated['rankAway']);
        $this->assertSame('2', $generated['rankHome']);
        $this->assertSame('3', $generated['recordAway']);
        $this->assertSame('4', $generated['recordHome']);
        $this->assertSame('5', $generated['scoreAway']);
        $this->assertSame('6', $generated['scoreHome']);
    }
}
