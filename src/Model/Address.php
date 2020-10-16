<?php

namespace WeTheRed\DockerApi\Model;

class Address
{
    /**
     * IP address.
     *
     * @var string
     */
    protected $addr;
    /**
     * Mask length of the IP address.
     *
     * @var int
     */
    protected $prefixLen;

    /**
     * IP address.
     *
     * @return string
     */
    public function getAddr() : string
    {
        return $this->addr;
    }

    /**
     * IP address.
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

    /**
     * Mask length of the IP address.
     *
     * @return int
     */
    public function getPrefixLen() : int
    {
        return $this->prefixLen;
    }

    /**
     * Mask length of the IP address.
     *
     * @param int $prefixLen
     *
     * @return self
     */
    public function setPrefixLen(int $prefixLen) : self
    {
        $this->prefixLen = $prefixLen;

        return $this;
    }
}
