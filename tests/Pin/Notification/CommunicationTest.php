<?php
namespace tests\Pin\Notification;

use Valorin\PinPusher\Pin\Icon;
use Valorin\PinPusher\Pin\Notification\Communication;

class CommunicationTest extends \PHPUnit_Framework_TestCase
{
    public function test_defaults()
    {
        $generated = (new Communication('communication title', Icon::NOTIFICATION_FACEBOOK_MESSENGER))
            ->generate();

        $this->assertEquals('commNotification', $generated['layout']['type']);
        $this->assertEquals('communication title', $generated['layout']['title']);
        $this->assertEquals(Icon::NOTIFICATION_FACEBOOK_MESSENGER, $generated['layout']['tinyIcon']);
    }
}
