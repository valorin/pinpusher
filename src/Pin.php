<?php
namespace Valorin\PinPusher;

use DateTime;
use Valorin\PinPusher\Pin\Action\Base as Action;
use Valorin\PinPusher\Pin\Layout\Base as Layout;
use Valorin\PinPusher\Pin\Notification\Generic as Notification;
use Valorin\PinPusher\Pin\Reminder\Generic as Reminder;

class Pin
{
    use Generator;

    const TIME_FORMAT = 'c';

    /**
     * @var DateTime
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
     * @param string   $id
     * @param DateTime $time
     * @param Layout   $layout
     */
    public function __construct($id, DateTime $time, Layout $layout)
    {
        $this->time   = $time;
        $this->layout = $layout;
        $this->id     = $id;
    }

    /**
     * @param int $duration
     *
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @param Notification $notification
     *
     * @return self
     */
    public function setCreateNotification(Notification $notification)
    {
        $this->createNotification = $notification;

        return $this;
    }

    /**
     * @param Notification $notification
     *
     * @return self
     */
    public function setUpdateNotification(Notification $notification)
    {
        $this->updateNotification = $notification;

        return $this;
    }

    /**
     * @param array $reminders
     *
     * @return self
     */
    public function setReminders($reminders)
    {
        $this->reminders = $reminders;

        return $this;
    }

    /**
     * @param Reminder $reminder
     *
     * @return self
     */
    public function addReminder(Reminder $reminder)
    {
        $this->reminders[] = $reminder;

        return $this;
    }

    /**
     * @param array $actions
     *
     * @return self
     */
    public function setActions($actions)
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * @param Action $action
     *
     * @return self
     */
    public function addAction(Action $action)
    {
        $this->actions[] = $action;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return Layout
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return Notification
     */
    public function getCreateNotification()
    {
        return $this->createNotification;
    }

    /**
     * @return Notification
     */
    public function getUpdateNotification()
    {
        return $this->updateNotification;
    }

    /**
     * @return array
     */
    public function getReminders()
    {
        return $this->reminders;
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }
}
