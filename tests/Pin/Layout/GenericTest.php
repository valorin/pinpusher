<?php
namespace tests\Pin\Layout;

use Valorin\PinPusher\Pin;
use Valorin\PinPusher\Pin\Color;
use Valorin\PinPusher\Pin\Icon;
use Valorin\PinPusher\Pin\Layout\Generic;

class GenericTest extends \PHPUnit_Framework_TestCase
{
    public function test_defaults()
    {
        $layout = (new Generic('generic title', Icon::CRICKET_GAME))->generate();

        $this->assertArrayHasKey('type', $layout);
        $this->assertArrayHasKey('title', $layout);
        $this->assertArrayHasKey('tinyIcon', $layout);

        $this->assertEquals('genericPin', $layout['type']);
        $this->assertEquals('generic title', $layout['title']);
        $this->assertEquals(Icon::CRICKET_GAME, $layout['tinyIcon']);
    }

    public function test_optional()
    {
        $layout = new Generic('generic title', Icon::GENERIC_CONFIRMATION);
        $layout->setForegroundColor(Color::BABY_BLUE_EYES)
            ->setBackgroundColor(Color::BRILLIANT_ROSE)
            ->setPrimaryColor(Color::CHROME_YELLOW)
            ->setSecondaryColor(Color::ELECTRIC_ULTRAMARINE)
            ->setShortSubtitle('short subtitle')
            ->setShortTitle('short title')
            ->setSubtitle('subtitle')
            ->setBody('body text')
            ->setSmallIcon(Icon::GLUCOSE_MONITOR)
            ->setLargeIcon(Icon::AMERICAN_FOOTBALL)
            ->setTitle('something else')
            ->setTinyIcon(Icon::ALARM_CLOCK);

        $generated = $layout->generate();

        $this->assertArrayHasKey('foregroundColor', $generated);
        $this->assertArrayHasKey('backgroundColor', $generated);
        $this->assertArrayHasKey('primaryColor', $generated);
        $this->assertArrayHasKey('secondaryColor', $generated);
        $this->assertArrayHasKey('shortSubtitle', $generated);
        $this->assertArrayHasKey('shortTitle', $generated);
        $this->assertArrayHasKey('subtitle', $generated);
        $this->assertArrayHasKey('body', $generated);
        $this->assertArrayHasKey('smallIcon', $generated);
        $this->assertArrayHasKey('largeIcon', $generated);
        $this->assertArrayHasKey('title', $generated);
        $this->assertArrayHasKey('tinyIcon', $generated);

        $this->assertEquals(Color::BABY_BLUE_EYES, $generated['foregroundColor']);
        $this->assertEquals(Color::BRILLIANT_ROSE, $generated['backgroundColor']);
        $this->assertEquals(Color::CHROME_YELLOW, $generated['primaryColor']);
        $this->assertEquals(Color::ELECTRIC_ULTRAMARINE, $generated['secondaryColor']);
        $this->assertEquals('short subtitle', $generated['shortSubtitle']);
        $this->assertEquals('short title', $generated['shortTitle']);
        $this->assertEquals('subtitle', $generated['subtitle']);
        $this->assertEquals('body text', $generated['body']);
        $this->assertEquals(Icon::GLUCOSE_MONITOR, $generated['smallIcon']);
        $this->assertEquals(Icon::AMERICAN_FOOTBALL, $generated['largeIcon']);
        $this->assertEquals('something else', $generated['title']);
    }

    public function test_last_updated_datetime_instance_is_cloned()
    {
        $time = new \DateTime;
        $original = clone $time;

        $layout = new Generic('title', Icon::MOVIE_EVENT);
        $layout->setLastUpdated($time);

        $time->modify('+1 day');

        $generated = $layout->generate();

        $this->assertArrayHasKey('lastUpdated', $generated);

        $this->assertNotEquals($time->format(Pin::TIME_FORMAT), $generated['lastUpdated']);
        $this->assertEquals($original->format(Pin::TIME_FORMAT), $generated['lastUpdated']);
    }

    public function test_set_headings_and_paragraphs_ignore_empties()
    {
        $layout = new Generic('title', Icon::LOCATION);
        $layout->setHeadings(['heading 1', 'heading 2', '']);
        $layout->setParagraphs(['paragraph 1', 'paragraph 2', '']);
        $generated = $layout->generate();

        $this->assertArrayHasKey('headings', $generated);
        $this->assertArrayHasKey('paragraphs', $generated);

        $this->assertEquals(['heading 1', 'heading 2'], $generated['headings']);
        $this->assertEquals(['paragraph 1', 'paragraph 2'], $generated['paragraphs']);
    }
}
