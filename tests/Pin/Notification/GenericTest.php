<?php
namespace tests\Pin\Notification;

use Valorin\PinPusher\Pin;
use Valorin\PinPusher\Pin\Icon;
use Valorin\PinPusher\Pin\Notification\Generic;

class GenericTest extends \PHPUnit_Framework_TestCase
{
    public function test_defaults()
    {
        $generated = (new Generic('generic title', Icon::NOTIFICATION_BLACKBERRY_MESSENGER))
            ->setTime($time = new \DateTime)
            ->generate();

        $this->assertArrayHasKey('time', $generated);
        $this->assertArrayHasKey('layout', $generated);
        $this->assertArrayNotHasKey('time', $generated['layout']);
        $this->assertEquals($time, $generated['time']);
        $this->assertEquals('genericNotification', $generated['layout']['type']);
        $this->assertEquals('generic title', $generated['layout']['title']);
        $this->assertEquals(Icon::NOTIFICATION_BLACKBERRY_MESSENGER, $generated['layout']['tinyIcon']);
    }

    public function test_time_is_cloned()
    {
        $time = new \DateTime;
        $original = clone $time;

        $notification = new Generic('title', Icon::MOVIE_EVENT);
        $notification->setTime($time);

        $time->modify('+1 day');

        $this->assertNotEquals($time, $notification->getTime());
        $this->assertEquals($original, $notification->getTime());
    }
}
