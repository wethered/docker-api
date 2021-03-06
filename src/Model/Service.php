<?php

namespace WeTheRed\DockerApi\Model;

class Service
{
    /**
     *
     *
     * @var string
     */
    protected $iD;
    /**
    * The version number of the object such as node, service, etc. This is needed
    to avoid conflicting writes. The client must send the version number along
    with the modified specification when updating these objects.

    This approach ensures safe concurrency and determinism in that the change
    on the object may not be applied if the version number has changed from the
    last read. In other words, if two update requests specify the same base
    version, only one of the requests can succeed. As a result, two separate
    update requests that happen at the same time will not unintentionally
    overwrite each other.

    *
    * @var ObjectVersion
    */
    protected $version;
    /**
     *
     *
     * @var string
     */
    protected $createdAt;
    /**
     *
     *
     * @var string
     */
    protected $updatedAt;
    /**
     * User modifiable configuration for a service.
     *
     * @var ServiceSpec
     */
    protected $spec;
    /**
     *
     *
     * @var ServiceEndpoint
     */
    protected $endpoint;
    /**
     * The status of a service update.
     *
     * @var ServiceUpdateStatus
     */
    protected $updateStatus;

    /**
     *
     *
     * @return string
     */
    public function getID() : string
    {
        return $this->iD;
    }

    /**
     *
     *
     * @param string $iD
     *
     * @return self
     */
    public function setID(string $iD) : self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
    * The version number of the object such as node, service, etc. This is needed
    to avoid conflicting writes. The client must send the version number along
    with the modified specification when updating these objects.

    This approach ensures safe concurrency and determinism in that the change
    on the object may not be applied if the version number has changed from the
    last read. In other words, if two update requests specify the same base
    version, only one of the requests can succeed. As a result, two separate
    update requests that happen at the same time will not unintentionally
    overwrite each other.

    *
    * @return ObjectVersion
    */
    public function getVersion() : ObjectVersion
    {
        return $this->version;
    }

    /**
    * The version number of the object such as node, service, etc. This is needed
    to avoid conflicting writes. The client must send the version number along
    with the modified specification when updating these objects.

    This approach ensures safe concurrency and determinism in that the change
    on the object may not be applied if the version number has changed from the
    last read. In other words, if two update requests specify the same base
    version, only one of the requests can succeed. As a result, two separate
    update requests that happen at the same time will not unintentionally
    overwrite each other.

    *
    * @param ObjectVersion $version
    *
    * @return self
    */
    public function setVersion(ObjectVersion $version) : self
    {
        $this->version = $version;

        return $this;
    }

    /**
     *
     *
     * @return string
     */
    public function getCreatedAt() : string
    {
        return $this->createdAt;
    }

    /**
     *
     *
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt(string $createdAt) : self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     *
     *
     * @return string
     */
    public function getUpdatedAt() : string
    {
        return $this->updatedAt;
    }

    /**
     *
     *
     * @param string $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(string $updatedAt) : self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * User modifiable configuration for a service.
     *
     * @return ServiceSpec
     */
    public function getSpec() : ServiceSpec
    {
        return $this->spec;
    }

    /**
     * User modifiable configuration for a service.
     *
     * @param ServiceSpec $spec
     *
     * @return self
     */
    public function setSpec(ServiceSpec $spec) : self
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     *
     *
     * @return ServiceEndpoint
     */
    public function getEndpoint() : ServiceEndpoint
    {
        return $this->endpoint;
    }

    /**
     *
     *
     * @param ServiceEndpoint $endpoint
     *
     * @return self
     */
    public function setEndpoint(ServiceEndpoint $endpoint) : self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * The status of a service update.
     *
     * @return ServiceUpdateStatus
     */
    public function getUpdateStatus() : ServiceUpdateStatus
    {
        return $this->updateStatus;
    }

    /**
     * The status of a service update.
     *
     * @param ServiceUpdateStatus $updateStatus
     *
     * @return self
     */
    public function setUpdateStatus(ServiceUpdateStatus $updateStatus) : self
    {
        $this->updateStatus = $updateStatus;

        return $this;
    }
}
