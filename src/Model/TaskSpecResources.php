<?php

namespace WeTheRed\DockerApi\Model;

class TaskSpecResources
{
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @var ResourceObject
    */
    protected $limits;
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @var ResourceObject
    */
    protected $reservation;
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @return ResourceObject
    */
    public function getLimits() : ResourceObject
    {
        return $this->limits;
    }
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @param ResourceObject $limits
    *
    * @return self
    */
    public function setLimits(ResourceObject $limits) : self
    {
        $this->limits = $limits;
        return $this;
    }
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @return ResourceObject
    */
    public function getReservation() : ResourceObject
    {
        return $this->reservation;
    }
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @param ResourceObject $reservation
    *
    * @return self
    */
    public function setReservation(ResourceObject $reservation) : self
    {
        $this->reservation = $reservation;
        return $this;
    }
}