<?php

namespace WeTheRed\DockerApi\Endpoint;

class SecretCreate extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     *
     *
     * @param \WeTheRed\DockerApi\Model\SecretsCreatePostBody $body
     */
    public function __construct(\WeTheRed\DockerApi\Model\SecretsCreatePostBody $body)
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
        return '/secrets/create';
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
     * @throws \WeTheRed\DockerApi\Exception\SecretCreateConflictException
     * @throws \WeTheRed\DockerApi\Exception\SecretCreateInternalServerErrorException
     * @throws \WeTheRed\DockerApi\Exception\SecretCreateServiceUnavailableException
     *
     * @return null|\WeTheRed\DockerApi\Model\IdResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\IdResponse', 'json');
        }
        if (409 === $status) {
            throw new \WeTheRed\DockerApi\Exception\SecretCreateConflictException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\SecretCreateInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \WeTheRed\DockerApi\Exception\SecretCreateServiceUnavailableException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
