# PinPusher

Simple Pebble Timeline Pin generator and pusher API wraper for PHP.

See the [official Pebble Timeline documentation](http://developer.getpebble.com/guides/timeline/) for more information.

## Installation

PinPusher can be installed with [composer](https://getcomposer.org/):

```
composer require valorin/pinpusher
```

## Features

- Error Handling *(TODO)*
- Tests! *(TODO)*

## Usage

```
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$pin = new Pin(
    new DateTime('2015-05-05 15:00:00'),
    new Pin\Layout\Generic(
        'This is a generic pin.',
        Pin\Icon::NOTIFICATION_GENERIC
    )
);

$pusher = new Pusher()
$pusher->pushToToken($userToken, $pin);
```



```
$pusher = new Pusher()
$pusher->setLogger(new PsrCompatibleLogger);
$pusher->pushToToken($userToken, $pin);
```
