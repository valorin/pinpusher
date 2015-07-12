# PinPusher

Simple Pebble Timeline Pin API wrapper, with full support for all of the Pebble Timeline API options.

*Currently supports SDK 3.0-beta10.*

See the [official Pebble Timeline documentation](http://developer.getpebble.com/guides/timeline/) for more information.

## Installation

PinPusher can be installed with [composer](https://getcomposer.org/):

```bash
composer require valorin/pinpusher
```

## Class Reference



## Examples

XHere are a couple of usage examples, based on the examples in the [Pebble Timeline documentation](http://developer.getpebble.com/guides/timeline/pin-structure/).

**Minimal Pin Example**

```json
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

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$pin = new Pin(
    'example-pin-generic-1',
    new DateTime('2015-03-19T18:00:00Z'),
    new Pin\Layout\Generic(
        "News at 6 o'clock",
        Pin\Icon::NOTIFICATION_FLAG
    )
);

$pusher = new Pusher()
$pusher->pushToUser($userToken, $pin);
```

**Complete Pin Example**

```json
{
  "id": "meeting-453923",
  "time": "2015-03-19T15:00:00Z",
  "duration": 60,
  "createNotification": {
    "layout": {
      "type": "genericNotification",
      "title": "New Item",
      "tinyIcon": "system://images/NOTIFICATION_FLAG",
      "body": "A new appointment has been added to your calendar at 4pm."
    }
  },
  "updateNotification": {
    "time": "2015-03-19T16:00:00Z",
    "layout": {
      "type": "genericNotification",
      "tinyIcon": "system://images/NOTIFICATION_FLAG",
      "title": "Reminder",
      "body": "The meeting has been rescheduled to 4pm."
    }
  },
  "layout": {
    "title": "Client Meeting",
    "type": "genericPin",
    "tinyIcon": "system://images/TIMELINE_CALENDAR",
    "body": "Meeting in Kepler at 4:00pm. Topic: discuss pizza toppings for party."
  },
  "reminders": [
    {
      "time": "2015-03-19T14:45:00Z",
      "layout": {
        "type": "genericReminder",
        "tinyIcon": "system://images/TIMELINE_CALENDAR",
        "title": "Meeting in 15 minutes"
      }
    },
    {
      "time": "2015-03-19T14:55:00Z",
      "layout": {
        "type": "genericReminder",
        "tinyIcon": "system://images/TIMELINE_CALENDAR",
        "title": "Meeting in 5 minutes"
      }
    }
  ],
  "actions": [
    {
      "title": "View Schedule",
      "type": "openWatchApp",
      "launchCode": 15
    },
    {
      "title": "Show Directions",
      "type": "openWatchApp",
      "launchCode": 22
    }
  ]
}
```

With PinPusher:

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

// Generic Layout
$layout = new Pin\Layout\Generic('Client Meeting', Pin\Icon::TIMELINE_CALENDAR);
$layout->setBody('Meeting in Kepler at 4:00pm. Topic: discuss pizza toppings for party.');

// Create Notification
$createNotification = new Pin\Notification\Generic('New Item', Pin\Icon::NOTIFICATION_FLAG);
$createNotification->setBody('A new appointment has been added to your calendar at 4pm.');

// Update Notification
$updateNotification = new Pin\Notification\Generic('Reminder', Pin\Icon::NOTIFICATION_FLAG);
$updateNotification->setTime(new DateTime('2015-03-19T16:00:00Z'))
                   ->setBody('The meeting has been rescheduled to 4pm.');

// Reminders
$reminders = [
    new Pin\Reminder\Generic(new DateTime('2015-03-19T14:45:00Z'), 'Meeting in 15 minutes', Pin\Icon::TIMELINE_CALENDAR),
    new Pin\Reminder\Generic(new DateTime('2015-03-19T14:55:00Z'), 'Meeting in 5 minutes', Pin\Icon::TIMELINE_CALENDAR),
];

// Actions
$actions = [
    new Pin\Action\OpenWatchApp('View Schedule', 15),
    new Pin\Action\OpenWatchApp('Show Directions', 22),
];

// Put it all together
$pin = new Pin('meeting-453923', new DateTime('2015-03-19T15:00:00Z'), $layout);
$pin->setDuration(60)
    ->setCreateNotification($createNotification)
    ->setUpdateNotification($updateNotification)
    ->setReminders($reminders)
    ->setActions($actions);
    
$pusher = new Pusher()
$pusher->pushToUser($userToken, $pin);
```

**[Generic Layout example](http://developer.getpebble.com/guides/timeline/pin-structure/#generic-layout)**

```json
{
  "id": "pin-generic-1",
  "time": "2015-03-18T15:45:00Z",
  "layout": {
    "type": "genericPin",
    "title": "This is a genericPin!",
    "tinyIcon": "system://images/NOTIFICATION_FLAG",
    "primaryColor": "#FFFFFF",
    "secondaryColor": "#666666",
    "backgroundColor": "#222222"
  }
}
```

With PinPusher:

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Generic('This is a genericPin!', Pin\Icon::NOTIFICATION_FLAG);
$layout->setPrimaryColor('#FFFFFF')     // Pin\Color::WHITE
       ->setSecondaryColor('#666666')   // No official equivalent
       ->setBackgroundColor('#222222'); // No official equivalent

$pin = new Pin('pin-generic-1', new DateTime('2015-03-18T15:45:00Z'), $layout);
$pusher->pushToUser($userToken, $pin);
```

*Note: The official Pebble documentation appears to have used invalid colour codes...*

**[Calendar Layout example](http://developer.getpebble.com/guides/timeline/pin-structure/#calendar-layout)**

```json
{
  "id": "pin-calendar-1",
  "time": "2015-03-18T15:45:00Z",
  "duration": 60,
  "layout": {
    "type": "calendarPin",
    "title": "Pin Layout Meeting",
    "locationName": "Conf Room 1",
    "body": "Discuss layout types with Design Team."
  }
}
```

With PinPusher:

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Calendar('Pin Layout Meeting');
$layout->setLocationName('Conf Room 1')
       ->setBody('Discuss layout types with Design Team.');

$pin = new Pin('pin-calendar-1', new DateTime('2015-03-18T15:45:00Z'), $layout);
$pin->setDuration(60);

$pusher->pushToUser($userToken, $pin);
```

**[Sports Layout example](http://developer.getpebble.com/guides/timeline/pin-structure/#sports-layout)**

```json
{
  "id": "pin-sports-1",
  "time": "2015-03-18T19:00:00Z",
  "layout": {
    "type": "sportsPin",
    "title": "Bulls at Bears",
    "subtitle": "Halftime",
    "body": "Game of the Century",
    "tinyIcon": "system://images/AMERICAN_FOOTBALL",
    "largeIcon": "system://images/AMERICAN_FOOTBALL",
    "lastUpdated": "2015-03-18T18:45:00Z",
    "rankAway": "03",
    "rankHome": "08",
    "nameAway": "POR",
    "nameHome": "LAC",
    "recordAway": "39-19",
    "recordHome": "39-21",
    "scoreAway": "54",
    "scoreHome": "49",
    "sportsGameState": "in-game"
  }
}
```

With PinPusher:

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Sports('Bulls at Bears', Pin\Icon::AMERICAN_FOOTBALL, Pin\Icon::AMERICAN_FOOTBALL);
$layout->setRankAway('03')
       ->setRankHome('08')
       ->setNameAway('POR')
       ->setNameHome('LAC')
       ->setRecordAway('39-19')
       ->setRecordHome('39-21')
       ->setScoreAway(54)
       ->setScoreHome(49)
       ->setSportsGameState(Pin\Layout\Sports::INGAME)
       ->setLastUpdated(new DateTime('2015-03-18T18:45:00Z'))
       ->setSubtitle('Halftime')
       ->setBody('Game of the Century');

$pin = new Pin('pin-sports-1', new DateTime('2015-03-18T19:00:00Z'), $layout);

$pusher->pushToUser($userToken, $pin);
```

**[Weather Layout example](http://developer.getpebble.com/guides/timeline/pin-structure/#weather-layout)**

```json
{
  "id": "pin-weather-1",
  "time": "2015-03-18T19:00:00Z",
  "layout": {
    "type": "weatherPin",
    "title": "Nice day",
    "subtitle": "40/65",
    "tinyIcon": "system://images/TIMELINE_SUN",
    "largeIcon": "system://images/TIMELINE_SUN",
    "locationName": "Palo Alto",
    "body": "Sunny with a chance of rain.",
    "lastUpdated": "2015-03-18T18:00:00Z"
  }
}
```

With PinPusher:

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Weather('Nice day', Pin\Icon::TIMELINE_SUN, Pin\Icon::TIMELINE_SUN, 'Palo Alto');
$layout->setLastUpdated(new DateTime('2015-03-18T18:00:00Z'))
       ->setSubtitle('40/65')
       ->setBody('Sunny with a chance of rain.');

$pin = new Pin('pin-weather-1', new DateTime('2015-03-18T19:00:00Z'), $layout);

$pusher->pushToUser($userToken, $pin);
```

**[Generic Reminder example](http://developer.getpebble.com/guides/timeline/pin-structure/#generic-reminder)**

```json
{
  "id": "pin-generic-reminder-1",
  "time": "2015-03-18T23:00:00Z",
  "layout": {
    "type": "genericPin",
    "title": "This is a genericPin!",
    "subtitle": "With a reminder!.",
    "tinyIcon": "system://images/NOTIFICATION_FLAG"
  },
  "reminders": [
    {
      "time": "2015-03-18T22:55:00Z",
      "layout": {
        "type": "genericReminder",
        "title": "Reminder!",
        "locationName": "Conf Rm 1",
        "tinyIcon": "system://images/ALARM_CLOCK"
      }
    }
  ]
}
```

With PinPusher:

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Generic('This is a genericPin!', Pin\Icon::NOTIFICATION_FLAG);
$layout->setSubtitle('With a reminder!.');

$reminder = new Pin\Reminder\Generic(new DateTime('2015-03-18T22:55:00Z'), 'Reminder!', Pin\Icon::ALARM_CLOCK);
$reminder->setLocationName('Conf Rm 1');

$pin = new Pin('pin-generic-reminder-1', new DateTime('2015-03-18T23:00:00Z'), $layout);
$pin->addReminder($reminder);

$pusher->pushToUser($userToken, $pin);
```

**[Generic Notification example](http://developer.getpebble.com/guides/timeline/pin-structure/#generic-notification)**

```json
{
  "id": "pin-generic-createmessage-1",
  "time": "2015-04-30T23:45:00Z",
  "layout": {
    "type": "genericPin",
    "title": "This is a genericPin!",
    "subtitle": "With a notification",
    "tinyIcon": "system://images/NOTIFICATION_FLAG"
  },
  "createNotification": {
    "layout": {
      "type": "genericNotification",
      "title": "Notification!",
      "tinyIcon": "system://images/NOTIFICATION_FLAG",
      "body": "A new genericPin has appeared!"
    }
  }
}
```

With PinPusher:

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Generic('This is a genericPin!', Pin\Icon::NOTIFICATION_FLAG);
$layout->setSubtitle('With a notification');

$notification = new Pin\Notification\Generic('Notification!', Pin\Icon::NOTIFICATION_FLAG);
$notification->setBody('A new genericPin has appeared!');

$pin = new Pin('pin-generic-createmessage-1', new DateTime('2015-04-30T23:45:00Z'), $layout);
$pin->addReminder($notification);

$pusher->pushToUser($userToken, $pin);
```

## Enable Debugging Logger

You can pass in a PSR-3 compatible logger, to enable debug logging:

```
$pusher = new Pusher()
$pusher->setLogger($psrCompatibleLogger);
$pusher->pushToUser($userToken, $pin);
```

**Example**

```php
use Valorin\PinPusher\Pusher;
use Valorin\PinPusher\Pin;

$layout = new Pin\Layout\Generic('This is a title', Pin\Icon::NOTIFICATION_REMINDER);
$layout->setBackgroundColor(Pin\Color::PICTON_BLUE)
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
