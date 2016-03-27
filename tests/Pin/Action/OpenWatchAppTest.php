<?php
namespace tests\Pin\Action;

use Valorin\PinPusher\Pin\Action\OpenWatchApp;

class OpenWatchAppTest extends \PHPUnit_Framework_TestCase
{
    public function test_correct_parameters()
    {
        $action = (new OpenWatchApp('title one', 123))->generate();

        $this->assertArrayHasKey('type', $action);
        $this->assertArrayHasKey('title', $action);
        $this->assertArrayHasKey('launchCode', $action);

        $this->assertEquals('openWatchApp', $action['type']);
        $this->assertEquals('title one', $action['title']);
        $this->assertEquals(123, $action['launchCode']);
    }
}
