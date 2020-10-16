<?php

namespace WeTheRed\DockerApi\Model;

class DistributionNameJsonGetResponse200
{
    /**
     * A descriptor struct containing digest, media type, and size.
     *
     * @var DistributionNameJsonGetResponse200Descriptor
     */
    protected $descriptor;
    /**
     * An array containing all platforms supported by the image.
     *
     * @var DistributionNameJsonGetResponse200PlatformsItem[]
     */
    protected $platforms;
    /**
     * A descriptor struct containing digest, media type, and size.
     *
     * @return DistributionNameJsonGetResponse200Descriptor
     */
    public function getDescriptor() : DistributionNameJsonGetResponse200Descriptor
    {
        return $this->descriptor;
    }
    /**
     * A descriptor struct containing digest, media type, and size.
     *
     * @param DistributionNameJsonGetResponse200Descriptor $descriptor
     *
     * @return self
     */
    public function setDescriptor(DistributionNameJsonGetResponse200Descriptor $descriptor) : self
    {
        $this->descriptor = $descriptor;
        return $this;
    }
    /**
     * An array containing all platforms supported by the image.
     *
     * @return DistributionNameJsonGetResponse200PlatformsItem[]
     */
    public function getPlatforms() : array
    {
        return $this->platforms;
    }
    /**
     * An array containing all platforms supported by the image.
     *
     * @param DistributionNameJsonGetResponse200PlatformsItem[] $platforms
     *
     * @return self
     */
    public function setPlatforms(array $platforms) : self
    {
        $this->platforms = $platforms;
        return $this;
    }
}