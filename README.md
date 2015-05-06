# PinPusher

**Important: PinPusher is still in early development and is currently feature limited.**

Simple Pebble Timeline Pin generator and pusher API wraper for PHP.

See the [official Pebble Timeline documentation](http://developer.getpebble.com/guides/timeline/) for more information.

## Installation

PinPusher can be installed with [composer](https://getcomposer.org/):

```
composer require valorin/pinpusher
```

## Features

- reminders
    - time *(TODO)*
    - layout *(TODO)*
        - genericReminder *(TODO)*
            - locationName
- actions
    - title *(TODO)*
    - type *(TODO)*
        - openWatchApp
    - launchCode *(TODO)*
- Notifications (Icons) *(TODO)*
- Create a Pin *(TODO)*
- Update a Pin *(TODO)*
- Delete a Pin *(TODO)*
- Create a Shared Pin *(TODO)*
- Delete a Shared Pin *(TODO)*
- Listing Topic Subscriptions *(TODO)*
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

e$pusher = new Pusher()
$pusher->pushToUser($userToken, $pin);
```
