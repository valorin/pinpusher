<?php
namespace tests\Pin\Action;

use Valorin\PinPusher\Pin\Action\Http;
use Valorin\PinPusher\Pin\Icon;

class HttpTest extends \PHPUnit_Framework_TestCase
{
    public function test_default_parameters()
    {
        $action = (new Http('title two', 'http://example.com'))->generate();

        $this->assertArrayHasKey('type', $action);
        $this->assertArrayHasKey('title', $action);
        $this->assertArrayHasKey('url', $action);

        $this->assertEquals('http', $action['type']);
        $this->assertEquals('title two', $action['title']);
        $this->assertEquals('http://example.com', $action['url']);
    }

    public function test_optional_parameters()
    {
        $action = new Http('title three', 'http://example.com');
        $action->setMethod('PUT')
            ->setHeaders(['headers' => 'value'])
            ->setBodyText('body text')
            ->setBodyJSON(['body' => 'json'])
            ->setSuccessText('success msg')
            ->setSuccessIcon(Icon::ALARM_CLOCK)
            ->setFailureText('failure msg')
            ->setFailureIcon(Icon::NO_EVENTS);

        $action = $action->generate();

        $this->assertArrayHasKey('method', $action);
        $this->assertArrayHasKey('headers', $action);
        $this->assertArrayHasKey('bodyText', $action);
        $this->assertArrayHasKey('bodyJSON', $action);
        $this->assertArrayHasKey('successText', $action);
        $this->assertArrayHasKey('successIcon', $action);
        $this->assertArrayHasKey('failureText', $action);
        $this->assertArrayHasKey('failureIcon', $action);

        $this->assertEquals('PUT', $action['method']);
        $this->assertEquals(['headers' => 'value'], $action['headers']);
        $this->assertEquals('body text', $action['bodyText']);
        $this->assertEquals(['body' => 'json'], $action['bodyJSON']);
        $this->assertEquals('success msg', $action['successText']);
        $this->assertEquals(Icon::ALARM_CLOCK, $action['successIcon']);
        $this->assertEquals('failure msg', $action['failureText']);
        $this->assertEquals(Icon::NO_EVENTS, $action['failureIcon']);
    }
}
