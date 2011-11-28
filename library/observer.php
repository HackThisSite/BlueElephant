<?php
/**
* Authors:
*   Joseph Moniz <joseph.moniz@gmail.com>
**/

class Observer
{
    const EVENT_BASE = 'events_';

    private static $instance;
    private $events;

    // singleton
    private function __construct($events = false)
    {
        if (!$events) return;
        $this->listen($events);
    }

    public static function singleton($events = false)
    {
        if (!isset(self::$instance))
        {
            $thisClass = __CLASS__;
            self::$instance = new $thisClass($events);
        }
        return self::$instance;
    }

    public function trigger($event, $data = null)
    {
        if (empty($this->events[$event])) return;
        foreach ($this->events[$event] as $action)
        {
            $action::handler($data);
        }
    }

    private function listen($events)
    {
        foreach ($events as $x => $eventSet)
        {
            foreach ($eventSet as $event)
            {
                $event = str_replace('/', '_', $x . '/' . $event);
                $this->events[$x][] = self::EVENT_BASE . $event;
            }
        }
    }

    public function __clone()
    {
        die("Error, can not be cloned");
    }
}
