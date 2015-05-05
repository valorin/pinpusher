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

- id *(TODO)*
- time *(TODO)*
- duration *(TODO)*
- createNotification *(TODO)*
    - layout *(TODO)*
        - genericNotification *(TODO)*
        - commNotification *(TODO)*
- updateNotification *(TODO)*
    - time *(TODO)*
    - layout *(TODO)*
- layout *(TODO)*
    - type *(TODO)*
        - genericPin *(TODO)*
        - calendarPin *(TODO)*
            - locationName
        - sportsPin *(TODO)*
            - rankAway *(TODO)*
            - rankHome *(TODO)*
            - nameAway *(TODO)*
            - nameHome *(TODO)*
            - recordAway *(TODO)*
            - recordHome *(TODO)*
            - scoreAway *(TODO)*
            - scoreHome *(TODO)*
            - sportsGameState *(TODO)*
        - weatherPin *(TODO)*
            - locationName
    - title *(TODO)*
    - shortTitle *(TODO)*
    - subtitle *(TODO)*
    - body *(TODO)*
    - tinyIcon *(TODO)*
    - smallIcon *(TODO)*
    - largeIcon *(TODO)*
    - foregroundColor *(TODO)*
    - backgroundColor *(TODO)*
    - headings *(TODO)*
    - paragraphs *(TODO)*
    - lastUpdated *(TODO)*
- reminders *(TODO)*
    - time *(TODO)*
    - layout *(TODO)*
        - genericReminder *(TODO)*
            - locationName
- actions *(TODO)*
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

## Usage

```
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$pin = new Pin(
    new DateTime('2015-05-05 15:00:00'),
    new Pin\GenericLayout(
        'This is a generic pin.',
        Pin\Icon::NOTIFICATION_GENERIC
    )
);

$pusher = new Pusher()
$pusher->pushToUser($userToken, $pin);
```
