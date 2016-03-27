<?php
namespace tests;

use DateTime;
use Valorin\PinPusher\Pin;

class PinTest extends \PHPUnit_Framework_TestCase
{
    public function test_complete_example()
    {
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

        $expected = <<<JSON
{
  "id": "meeting-453923",
  "time": "2015-03-19T15:00:00+00:00",
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
    "time": "2015-03-19T16:00:00+00:00",
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
      "time": "2015-03-19T14:45:00+00:00",
      "layout": {
        "type": "genericReminder",
        "tinyIcon": "system://images/TIMELINE_CALENDAR",
        "title": "Meeting in 15 minutes"
      }
    },
    {
      "time": "2015-03-19T14:55:00+00:00",
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
JSON;
        $expected = json_decode($expected, true);

        $this->assertEquals($expected, $pin->generate());
    }
}
