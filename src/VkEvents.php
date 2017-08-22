<?php

namespace VkEvents;

use VkEvents\Factory\EventsFactory;

final class VkEvents
{
    protected $eventType = null;
    protected $eventData = null;

    public function __construct(array $arrayData)
    {
        $this->eventType = $arrayData['type'];
        $this->eventData = $arrayData['object'];
    }

    public function getEventData()
    {
        return $this->eventData;
    }

    public function create()
    {
        try {
            EventsFactory::createEvent($this->eventType);
            return $this->eventType;
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function response()
    {
        return 'ok';
    }
}