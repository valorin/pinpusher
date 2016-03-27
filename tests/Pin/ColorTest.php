<?php
namespace tests\Pin\Color;

use Valorin\PinPusher\Pin\Color;

class ColorTest extends \PHPUnit_Framework_TestCase
{
    public function test_is_valid_with_random()
    {
        $this->assertTrue(Color::isValid(Color::random()));
        $this->assertFalse(Color::isValid('FF0066'));
    }

    public function test_foreground()
    {
        $this->assertEquals(Color::WHITE, Color::foreground('#005555'));
        $this->assertEquals(Color::BLACK, Color::foreground('#FFAA55'));
    }
}
