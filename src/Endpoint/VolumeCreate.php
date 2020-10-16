<?php

namespace WeTheRed\DockerApi\Endpoint;

class VolumeCreate extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     *
     *
     * @param \WeTheRed\DockerApi\Model\VolumesCreatePostBody $volumeConfig Volume configuration
     */
    public function __construct(\WeTheRed\DockerApi\Model\VolumesCreatePostBody $volumeConfig)
    {
        $this->body = $volumeConfig;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'POST';
    }

    public function getUri() : string
    {
        return '/volumes/create';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }

    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\VolumeCreateInternalServerErrorException
     *
     * @return null|\WeTheRed\DockerApi\Model\Volume
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\Volume', 'json');
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\VolumeCreateInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
