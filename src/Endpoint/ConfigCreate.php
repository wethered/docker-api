<?php

namespace WeTheRed\DockerApi\Endpoint;

class ConfigCreate extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     *
     *
     * @param \WeTheRed\DockerApi\Model\ConfigsCreatePostBody $body
     */
    public function __construct(\WeTheRed\DockerApi\Model\ConfigsCreatePostBody $body)
    {
        $this->body = $body;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'POST';
    }

    public function getUri() : string
    {
        return '/configs/create';
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
     * @throws \WeTheRed\DockerApi\Exception\ConfigCreateConflictException
     * @throws \WeTheRed\DockerApi\Exception\ConfigCreateInternalServerErrorException
     * @throws \WeTheRed\DockerApi\Exception\ConfigCreateServiceUnavailableException
     *
     * @return null|\WeTheRed\DockerApi\Model\IdResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\IdResponse', 'json');
        }
        if (409 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ConfigCreateConflictException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ConfigCreateInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ConfigCreateServiceUnavailableException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
