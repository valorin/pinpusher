<?php
namespace tests\Pin\Layout;

use Valorin\PinPusher\Pin\Icon;
use Valorin\PinPusher\Pin\Layout\Weather;

class WeatherTest extends \PHPUnit_Framework_TestCase
{
    public function test_defaults()
    {
        $generated = (new Weather('weather title', Icon::SUNRISE, Icon::SUNSET, 'location name'))
            ->generate();

        $this->assertEquals('weatherPin', $generated['type']);
        $this->assertEquals('weather title', $generated['title']);
        $this->assertEquals(Icon::SUNRISE, $generated['tinyIcon']);
        $this->assertEquals(Icon::SUNSET, $generated['largeIcon']);
        $this->assertEquals('location name', $generated['locationName']);
    }
}
