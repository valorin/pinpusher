<?php
namespace tests\Pin\Layout;

use Valorin\PinPusher\Pin\Layout\Calendar;

class CalendarTest extends \PHPUnit_Framework_TestCase
{
    public function test_defaults()
    {
        $layout = (new Calendar('calendar title'))->generate();

        $this->assertArrayHasKey('type', $layout);
        $this->assertArrayHasKey('title', $layout);

        $this->assertEquals('calendarPin', $layout['type']);
        $this->assertEquals('calendar title', $layout['title']);
    }

    public function test_set_location_name_is_truncated()
    {
        $layout = (new Calendar('title'))
            ->setLocationName(str_pad('', 300, '.'));
        $generated = $layout->generate();

        $this->assertEquals(256, strlen($generated['locationName']));
    }
}
