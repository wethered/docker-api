<?php

namespace WeTheRed\DockerApi\Model;

class DistributionNameJsonGetResponse200PlatformsItem
{
    /**
     *
     *
     * @var string
     */
    protected $architecture;
    /**
     *
     *
     * @var string
     */
    protected $oS;
    /**
     *
     *
     * @var string
     */
    protected $oSVersion;
    /**
     *
     *
     * @var string[]
     */
    protected $oSFeatures;
    /**
     *
     *
     * @var string
     */
    protected $variant;
    /**
     *
     *
     * @var string[]
     */
    protected $features;

    /**
     *
     *
     * @return string
     */
    public function getArchitecture() : string
    {
        return $this->architecture;
    }

    /**
     *
     *
     * @param string $architecture
     *
     * @return self
     */
    public function setArchitecture(string $architecture) : self
    {
        $this->architecture = $architecture;

        return $this;
    }

    /**
     *
     *
     * @return string
     */
    public function getOS() : string
    {
        return $this->oS;
    }

    /**
     *
     *
     * @param string $oS
     *
     * @return self
     */
    public function setOS(string $oS) : self
    {
        $this->oS = $oS;

        return $this;
    }

    /**
     *
     *
     * @return string
     */
    public function getOSVersion() : string
    {
        return $this->oSVersion;
    }

    /**
     *
     *
     * @param string $oSVersion
     *
     * @return self
     */
    public function setOSVersion(string $oSVersion) : self
    {
        $this->oSVersion = $oSVersion;

        return $this;
    }

    /**
     *
     *
     * @return string[]
     */
    public function getOSFeatures() : array
    {
        return $this->oSFeatures;
    }

    /**
     *
     *
     * @param string[] $oSFeatures
     *
     * @return self
     */
    public function setOSFeatures(array $oSFeatures) : self
    {
        $this->oSFeatures = $oSFeatures;

        return $this;
    }

    /**
     *
     *
     * @return string
     */
    public function getVariant() : string
    {
        return $this->variant;
    }

    /**
     *
     *
     * @param string $variant
     *
     * @return self
     */
    public function setVariant(string $variant) : self
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     *
     *
     * @return string[]
     */
    public function getFeatures() : array
    {
        return $this->features;
    }

    /**
     *
     *
     * @param string[] $features
     *
     * @return self
     */
    public function setFeatures(array $features) : self
    {
        $this->features = $features;

        return $this;
    }
}
