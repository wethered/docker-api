<?php

namespace WeTheRed\DockerApi\Endpoint;

class SwarmUpdate extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
    *
    *
    * @param \WeTheRed\DockerApi\Model\SwarmSpec $body
    * @param array $queryParameters {
    *     @var int $version The version number of the swarm object being updated. This is
    required to avoid conflicting writes.

    *     @var bool $rotateWorkerToken Rotate the worker join token.
    *     @var bool $rotateManagerToken Rotate the manager join token.
    *     @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
    * }
    */
    public function __construct(\WeTheRed\DockerApi\Model\SwarmSpec $body, array $queryParameters = [])
    {
        $this->body = $body;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'POST';
    }

    public function getUri() : string
    {
        return '/swarm/update';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }

    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['version', 'rotateWorkerToken', 'rotateManagerToken', 'rotateManagerUnlockKey']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults(['rotateWorkerToken' => false, 'rotateManagerToken' => false, 'rotateManagerUnlockKey' => false]);
        $optionsResolver->setAllowedTypes('version', ['int']);
        $optionsResolver->setAllowedTypes('rotateWorkerToken', ['bool']);
        $optionsResolver->setAllowedTypes('rotateManagerToken', ['bool']);
        $optionsResolver->setAllowedTypes('rotateManagerUnlockKey', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\SwarmUpdateBadRequestException
     * @throws \WeTheRed\DockerApi\Exception\SwarmUpdateInternalServerErrorException
     * @throws \WeTheRed\DockerApi\Exception\SwarmUpdateServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \WeTheRed\DockerApi\Exception\SwarmUpdateBadRequestException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\SwarmUpdateInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \WeTheRed\DockerApi\Exception\SwarmUpdateServiceUnavailableException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
