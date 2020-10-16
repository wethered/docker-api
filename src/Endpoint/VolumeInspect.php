<?php

namespace WeTheRed\DockerApi\Endpoint;

class VolumeInspect extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $name;

    /**
     *
     *
     * @param string $name Volume name or ID
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'GET';
    }

    public function getUri() : string
    {
        return str_replace(['{name}'], [$this->name], '/volumes/{name}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return [[], null];
    }

    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\VolumeInspectNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\VolumeInspectInternalServerErrorException
     *
     * @return null|\WeTheRed\DockerApi\Model\Volume
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\Volume', 'json');
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\VolumeInspectNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\VolumeInspectInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
