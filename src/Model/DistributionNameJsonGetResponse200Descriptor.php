<?php

namespace WeTheRed\DockerApi\Model;

class DistributionNameJsonGetResponse200Descriptor
{
    /**
     * 
     *
     * @var string
     */
    protected $mediaType;
    /**
     * 
     *
     * @var int
     */
    protected $size;
    /**
     * 
     *
     * @var string
     */
    protected $digest;
    /**
     * 
     *
     * @var string[]
     */
    protected $uRLs;
    /**
     * 
     *
     * @return string
     */
    public function getMediaType() : string
    {
        return $this->mediaType;
    }
    /**
     * 
     *
     * @param string $mediaType
     *
     * @return self
     */
    public function setMediaType(string $mediaType) : self
    {
        $this->mediaType = $mediaType;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getSize() : int
    {
        return $this->size;
    }
    /**
     * 
     *
     * @param int $size
     *
     * @return self
     */
    public function setSize(int $size) : self
    {
        $this->size = $size;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getDigest() : string
    {
        return $this->digest;
    }
    /**
     * 
     *
     * @param string $digest
     *
     * @return self
     */
    public function setDigest(string $digest) : self
    {
        $this->digest = $digest;
        return $this;
    }
    /**
     * 
     *
     * @return string[]
     */
    public function getURLs() : array
    {
        return $this->uRLs;
    }
    /**
     * 
     *
     * @param string[] $uRLs
     *
     * @return self
     */
    public function setURLs(array $uRLs) : self
    {
        $this->uRLs = $uRLs;
        return $this;
    }
}