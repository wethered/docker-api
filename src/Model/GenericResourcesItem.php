<?php

namespace WeTheRed\DockerApi\Model;

class GenericResourcesItem
{
    /**
     * 
     *
     * @var GenericResourcesItemNamedResourceSpec
     */
    protected $namedResourceSpec;
    /**
     * 
     *
     * @var GenericResourcesItemDiscreteResourceSpec
     */
    protected $discreteResourceSpec;
    /**
     * 
     *
     * @return GenericResourcesItemNamedResourceSpec
     */
    public function getNamedResourceSpec() : GenericResourcesItemNamedResourceSpec
    {
        return $this->namedResourceSpec;
    }
    /**
     * 
     *
     * @param GenericResourcesItemNamedResourceSpec $namedResourceSpec
     *
     * @return self
     */
    public function setNamedResourceSpec(GenericResourcesItemNamedResourceSpec $namedResourceSpec) : self
    {
        $this->namedResourceSpec = $namedResourceSpec;
        return $this;
    }
    /**
     * 
     *
     * @return GenericResourcesItemDiscreteResourceSpec
     */
    public function getDiscreteResourceSpec() : GenericResourcesItemDiscreteResourceSpec
    {
        return $this->discreteResourceSpec;
    }
    /**
     * 
     *
     * @param GenericResourcesItemDiscreteResourceSpec $discreteResourceSpec
     *
     * @return self
     */
    public function setDiscreteResourceSpec(GenericResourcesItemDiscreteResourceSpec $discreteResourceSpec) : self
    {
        $this->discreteResourceSpec = $discreteResourceSpec;
        return $this;
    }
}