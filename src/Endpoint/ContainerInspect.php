<?php

namespace WeTheRed\DockerApi\Endpoint;

class ContainerInspect extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $id;

    /**
     * Return low-level information about a container.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`
     * }
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'GET';
    }

    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/json');
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
        $optionsResolver->setDefined(['size']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['size' => false]);
        $optionsResolver->setAllowedTypes('size', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\ContainerInspectNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\ContainerInspectInternalServerErrorException
     *
     * @return null|\WeTheRed\DockerApi\Model\ContainersIdJsonGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ContainersIdJsonGetResponse200', 'json');
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ContainerInspectNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ContainerInspectInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
