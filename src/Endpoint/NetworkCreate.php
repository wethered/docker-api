<?php

namespace WeTheRed\DockerApi\Endpoint;

class NetworkCreate extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     * 
     *
     * @param \WeTheRed\DockerApi\Model\NetworksCreatePostBody $networkConfig Network configuration
     */
    public function __construct(\WeTheRed\DockerApi\Model\NetworksCreatePostBody $networkConfig)
    {
        $this->body = $networkConfig;
    }
    use \Jane\OpenApiRuntime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/networks/create';
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
     * @throws \WeTheRed\DockerApi\Exception\NetworkCreateForbiddenException
     * @throws \WeTheRed\DockerApi\Exception\NetworkCreateNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\NetworkCreateInternalServerErrorException
     *
     * @return null|\WeTheRed\DockerApi\Model\NetworksCreatePostResponse201
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\NetworksCreatePostResponse201', 'json');
        }
        if (403 === $status) {
            throw new \WeTheRed\DockerApi\Exception\NetworkCreateForbiddenException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\NetworkCreateNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\NetworkCreateInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}