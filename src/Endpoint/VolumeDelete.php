<?php

namespace WeTheRed\DockerApi\Endpoint;

class VolumeDelete extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $name;

    /**
     * Instruct the driver to remove the volume.
     *
     * @param string $name Volume name or ID
     * @param array $queryParameters {
     *     @var bool $force Force the removal of the volume
     * }
     */
    public function __construct(string $name, array $queryParameters = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'DELETE';
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

    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['force']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['force' => false]);
        $optionsResolver->setAllowedTypes('force', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\VolumeDeleteNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\VolumeDeleteConflictException
     * @throws \WeTheRed\DockerApi\Exception\VolumeDeleteInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (204 === $status) {
            return null;
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\VolumeDeleteNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (409 === $status) {
            throw new \WeTheRed\DockerApi\Exception\VolumeDeleteConflictException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\VolumeDeleteInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
