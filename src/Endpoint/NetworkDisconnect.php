<?php

namespace WeTheRed\DockerApi\Endpoint;

class NetworkDisconnect extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param \WeTheRed\DockerApi\Model\NetworksIdDisconnectPostBody $container 
     */
    public function __construct(string $id, \WeTheRed\DockerApi\Model\NetworksIdDisconnectPostBody $container)
    {
        $this->id = $id;
        $this->body = $container;
    }
    use \Jane\OpenApiRuntime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/networks/{id}/disconnect');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\NetworkDisconnectForbiddenException
     * @throws \WeTheRed\DockerApi\Exception\NetworkDisconnectNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\NetworkDisconnectInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return null;
        }
        if (403 === $status) {
            throw new \WeTheRed\DockerApi\Exception\NetworkDisconnectForbiddenException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\NetworkDisconnectNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\NetworkDisconnectInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}