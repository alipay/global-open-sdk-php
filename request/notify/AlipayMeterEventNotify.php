<?php

namespace Request\notify;

class AlipayMeterEventNotify extends \Request\notify\AlipayNotify
{
    public $eventName;

    /** @var \Model\ErrorEvent[] */
    public $errorEvents;

    public function getEventName()
    {
        return $this->eventName;
    }

    public function setEventName($eventName): void
    {
        $this->eventName = $eventName;
    }

    public function getErrorEvents()
    {
        return $this->errorEvents;
    }

    public function setErrorEvents($errorEvents): void
    {
        $this->errorEvents = $errorEvents;
    }
}
