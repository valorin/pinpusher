<?php
namespace Valorin\PinPusher;

use Valorin\PinPusher\Pin\Action\Base as Action;
use Valorin\PinPusher\Pin\Layout\Base as Layout;
use Valorin\PinPusher\Pin\Notification;
use Valorin\PinPusher\Pin\Reminder;

class Pin
{
    use Generator;

    const TIME_FORMAT = 'Y-m-d\TH:i:s\Z';

    /**
     * @var \DateTime
     */
    protected $time;

    /**
     * @var Layout
     */
    protected $layout;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var Notification
     */
    protected $createNotification;

    /**
     * @var Notification
     */
    protected $updateNotification;

    /**
     * @var array
     */
    protected $reminders = [];

    /**
     * @var array
     */
    protected $actions = [];

    /**
     * @param \DateTime $time
     * @param Layout    $layout
     */
    public function __construct(\DateTime $time, Layout $layout)
    {
        $this->time = $time;
        $this->layout = $layout;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $duration
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @param Notification $notification
     * @return self
     */
    public function setCreateNotification(Notification $notification)
    {
        $this->createNotification = $notification;

        return $this;
    }

    /**
     * @param Notification $notification
     * @return self
     */
    public function setUpdateNotification(Notification $notification)
    {
        $this->updateNotification = $notification;

        return $this;
    }

    /**
     * @param array $reminders
     * @return self
     */
    public function setReminders($reminders)
    {
        $this->reminders = $reminders;

        return $this;
    }

    /**
     * @param Reminder $reminder
     * @return self
     */
    public function addReminder(Reminder $reminder)
    {
        $this->reminders[] = $reminder;

        return $this;
    }

    /**
     * @param array $actions
     * @return self
     */
    public function setActions($actions)
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * @param Action $action
     * @return self
     */
    public function addAction(Action $action)
    {
        $this->actions[] = $action;

        return $this;
    }
}
