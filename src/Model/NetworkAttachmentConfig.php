<?php

namespace WeTheRed\DockerApi\Model;

class NetworkAttachmentConfig
{
    /**
     * The target network for attachment. Must be a network name or ID.
     *
     * @var string
     */
    protected $target;
    /**
     * Discoverable alternate names for the service on this network.
     *
     * @var string[]
     */
    protected $aliases;
    /**
     * Driver attachment options for the network target.
     *
     * @var string[]
     */
    protected $driverOpts;

    /**
     * The target network for attachment. Must be a network name or ID.
     *
     * @return string
     */
    public function getTarget() : string
    {
        return $this->target;
    }

    /**
     * The target network for attachment. Must be a network name or ID.
     *
     * @param string $target
     *
     * @return self
     */
    public function setTarget(string $target) : self
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Discoverable alternate names for the service on this network.
     *
     * @return string[]
     */
    public function getAliases() : array
    {
        return $this->aliases;
    }

    /**
     * Discoverable alternate names for the service on this network.
     *
     * @param string[] $aliases
     *
     * @return self
     */
    public function setAliases(array $aliases) : self
    {
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * Driver attachment options for the network target.
     *
     * @return string[]
     */
    public function getDriverOpts() : iterable
    {
        return $this->driverOpts;
    }

    /**
     * Driver attachment options for the network target.
     *
     * @param string[] $driverOpts
     *
     * @return self
     */
    public function setDriverOpts(iterable $driverOpts) : self
    {
        $this->driverOpts = $driverOpts;

        return $this;
    }
}
