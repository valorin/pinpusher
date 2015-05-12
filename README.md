# PinPusher

Simple Pebble Timeline Pin API wrapper, with full support for all of the Pebble Timeline API options.

*Currently supports SDK 3.0-beta10.*

See the [official Pebble Timeline documentation](http://developer.getpebble.com/guides/timeline/) for more information.

## Installation

PinPusher can be installed with [composer](https://getcomposer.org/):

```
composer require valorin/pinpusher
```

## Usage

**More documentation to come...**

Here are a couple of usage examples, based on the examples in the [Pebble Timeline documentation](http://developer.getpebble.com/guides/timeline/pin-structure/).

**Minimal Pin Example**

```
{
  "id": "example-pin-generic-1",
  "time": "2015-03-19T18:00:00Z",
  "layout": {
    "type": "genericPin",
    "title": "News at 6 o'clock",
    "tinyIcon": "system://images/NOTIFICATION_FLAG"
  }
}
```

With PinPusher:

```
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$pin = new Pin(
    'example-pin-generic-1',
    new DateTime('2015-03-19T18:00:00Z'),
    new Pin\Layout\Generic(
        'TNews at 6 o'clock',
        Pin\Icon::NOTIFICATION_FLAG
    )
);

$pusher = new Pusher()
$pusher->pushToUser($userToken, $pin);
```

**Enable Debugging Logger**

You can pass in a PSR-3 compatible logger, to enable debug logging:

```
$pusher = new Pusher()
$pusher->setLogger($psrCompatibleLogger);
$pusher->pushToUser($userToken, $pin);
```

**A more complete example**

```
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Generic('This is a title', Pin\Icon::NOTIFICATION_REMINDER);
$layout->setBackgroundColor('PictonBlue')
       ->setSubtitle('This is a subtitle')
       ->setBody('This is the body of the main layout...');

$reminder = new Pin\Reminder\Generic(Carbon::now(), 'This is a title', Pin\Icon::NOTIFICATION_REMINDER);
$reminder->setLocationName('Canberra, Australia');

$pin = new Pin('abc-123', $waterPin->time, $layout);

$pin->addReminder($reminder)
    ->setActions([
        new Pin\Action\OpenWatchApp('Yes, I have!', 1),
        new Pin\Action\OpenWatchApp('No, not yet...', 2),
    ]);

$pusher = new Pusher()
$pusher->setLogger($psrCompatibleLogger);
$pusher->pushToUser($userToken, $pin);
```
