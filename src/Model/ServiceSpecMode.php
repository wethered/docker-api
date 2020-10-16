<?php

namespace WeTheRed\DockerApi\Model;

class ServiceSpecMode
{
    /**
     * 
     *
     * @var ServiceSpecModeReplicated
     */
    protected $replicated;
    /**
     * 
     *
     * @var mixed
     */
    protected $global;
    /**
     * 
     *
     * @return ServiceSpecModeReplicated
     */
    public function getReplicated() : ServiceSpecModeReplicated
    {
        return $this->replicated;
    }
    /**
     * 
     *
     * @param ServiceSpecModeReplicated $replicated
     *
     * @return self
     */
    public function setReplicated(ServiceSpecModeReplicated $replicated) : self
    {
        $this->replicated = $replicated;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getGlobal()
    {
        return $this->global;
    }
    /**
     * 
     *
     * @param mixed $global
     *
     * @return self
     */
    public function setGlobal($global) : self
    {
        $this->global = $global;
        return $this;
    }
}