<?php

namespace WeTheRed\DockerApi\Model;

class NodeStatus
{
    /**
     * NodeState represents the state of a node.
     *
     * @var string
     */
    protected $state;
    /**
     * 
     *
     * @var string
     */
    protected $message;
    /**
     * IP address of the node.
     *
     * @var string
     */
    protected $addr;
    /**
     * NodeState represents the state of a node.
     *
     * @return string
     */
    public function getState() : string
    {
        return $this->state;
    }
    /**
     * NodeState represents the state of a node.
     *
     * @param string $state
     *
     * @return self
     */
    public function setState(string $state) : self
    {
        $this->state = $state;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }
    /**
     * 
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message) : self
    {
        $this->message = $message;
        return $this;
    }
    /**
     * IP address of the node.
     *
     * @return string
     */
    public function getAddr() : string
    {
        return $this->addr;
    }
    /**
     * IP address of the node.
     *
     * @param string $addr
     *
     * @return self
     */
    public function setAddr(string $addr) : self
    {
        $this->addr = $addr;
        return $this;
    }
}