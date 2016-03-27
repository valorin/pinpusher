<?php
namespace tests\Pin\Reminder;

use Valorin\PinPusher\Pin\Icon;
use Valorin\PinPusher\Pin\Reminder\Generic;

class GenericTest extends \PHPUnit_Framework_TestCase
{
    public function test_defaults()
    {
        $time = new \DateTime;
        $generated = (new Generic($time, 'generic title', Icon::REACHED_FITNESS_GOAL))
            ->generate();

        $this->assertArrayHasKey('time', $generated);
        $this->assertArrayHasKey('layout', $generated);
        $this->assertArrayNotHasKey('time', $generated['layout']);
        $this->assertEquals('genericReminder', $generated['layout']['type']);
        $this->assertEquals('generic title', $generated['layout']['title']);
        $this->assertEquals(Icon::REACHED_FITNESS_GOAL, $generated['layout']['tinyIcon']);
    }

    public function test_location_name_is_truncated()
    {
        $layout = (new Generic(new \DateTime, 'title', Icon::DISMISSED_PHONE_CALL))
            ->setLocationName(str_pad('', 300, '.'));
        $generated = $layout->generate();

        $this->assertEquals(256, strlen($generated['layout']['locationName']));
    }
}
