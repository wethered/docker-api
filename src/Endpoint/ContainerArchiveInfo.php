<?php

namespace WeTheRed\DockerApi\Endpoint;

class ContainerArchiveInfo extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $id;

    /**
    * A response header `X-Docker-Container-Path-Stat` is returned, containing
    a base64 - encoded JSON object with some filesystem header information
    about the path.

    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $path Resource in the container’s filesystem to archive.
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
        return 'HEAD';
    }

    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/archive');
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
        $optionsResolver->setDefined(['path']);
        $optionsResolver->setRequired(['path']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('path', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\ContainerArchiveInfoBadRequestException
     * @throws \WeTheRed\DockerApi\Exception\ContainerArchiveInfoNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\ContainerArchiveInfoInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ContainerArchiveInfoBadRequestException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ContainersIdArchiveHeadResponse400', 'json'));
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ContainerArchiveInfoNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ContainerArchiveInfoInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
