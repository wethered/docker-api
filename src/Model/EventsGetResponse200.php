<?php

namespace WeTheRed\DockerApi\Model;

class EventsGetResponse200
{
    /**
     * The type of object emitting the event
     *
     * @var string
     */
    protected $type;
    /**
     * The type of event
     *
     * @var string
     */
    protected $action;
    /**
     *
     *
     * @var EventsGetResponse200Actor
     */
    protected $actor;
    /**
     * Timestamp of event
     *
     * @var int
     */
    protected $time;
    /**
     * Timestamp of event, with nanosecond accuracy
     *
     * @var int
     */
    protected $timeNano;

    /**
     * The type of object emitting the event
     *
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * The type of object emitting the event
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type) : self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * The type of event
     *
     * @return string
     */
    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * The type of event
     *
     * @param string $action
     *
     * @return self
     */
    public function setAction(string $action) : self
    {
        $this->action = $action;

        return $this;
    }

    /**
     *
     *
     * @return EventsGetResponse200Actor
     */
    public function getActor() : EventsGetResponse200Actor
    {
        return $this->actor;
    }

    /**
     *
     *
     * @param EventsGetResponse200Actor $actor
     *
     * @return self
     */
    public function setActor(EventsGetResponse200Actor $actor) : self
    {
        $this->actor = $actor;

        return $this;
    }

    /**
     * Timestamp of event
     *
     * @return int
     */
    public function getTime() : int
    {
        return $this->time;
    }

    /**
     * Timestamp of event
     *
     * @param int $time
     *
     * @return self
     */
    public function setTime(int $time) : self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Timestamp of event, with nanosecond accuracy
     *
     * @return int
     */
    public function getTimeNano() : int
    {
        return $this->timeNano;
    }

    /**
     * Timestamp of event, with nanosecond accuracy
     *
     * @param int $timeNano
     *
     * @return self
     */
    public function setTimeNano(int $timeNano) : self
    {
        $this->timeNano = $timeNano;

        return $this;
    }
}
