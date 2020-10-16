<?php

namespace WeTheRed\DockerApi\Model;

class ContainerSummaryItemHostConfig
{
    /**
     *
     *
     * @var string
     */
    protected $networkMode;

    /**
     *
     *
     * @return string
     */
    public function getNetworkMode() : string
    {
        return $this->networkMode;
    }

    /**
     *
     *
     * @param string $networkMode
     *
     * @return self
     */
    public function setNetworkMode(string $networkMode) : self
    {
        $this->networkMode = $networkMode;

        return $this;
    }
}
