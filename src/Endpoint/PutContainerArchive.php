<?php

namespace WeTheRed\DockerApi\Endpoint;

class PutContainerArchive extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $id;

    /**
    * Upload a tar archive to be extracted to a path in the filesystem of container id.
    *
    * @param string $id ID or name of the container
    * @param string|resource|\Psr\Http\Message\StreamInterface $inputStream The input stream must be a tar archive compressed with one of the
    following algorithms: `identity` (no compression), `gzip`, `bzip2`,
    or `xz`.

    * @param array $queryParameters {
    *     @var string $path Path to a directory in the container to extract the archive’s contents into.
    *     @var string $noOverwriteDirNonDir If `1`, `true`, or `True` then it will be an error if unpacking the
    given content would cause an existing directory to be replaced with
    a non-directory and vice versa.

    *     @var string $copyUIDGID If `1`, `true`, then it will copy UID/GID maps to the dest file or
    dir

    * }
    */
    public function __construct(string $id, $inputStream, array $queryParameters = [])
    {
        $this->id = $id;
        $this->body = $inputStream;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'PUT';
    }

    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/archive');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return [[], $this->body];
    }

    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['path', 'noOverwriteDirNonDir', 'copyUIDGID']);
        $optionsResolver->setRequired(['path']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('path', ['string']);
        $optionsResolver->setAllowedTypes('noOverwriteDirNonDir', ['string']);
        $optionsResolver->setAllowedTypes('copyUIDGID', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\PutContainerArchiveBadRequestException
     * @throws \WeTheRed\DockerApi\Exception\PutContainerArchiveForbiddenException
     * @throws \WeTheRed\DockerApi\Exception\PutContainerArchiveNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\PutContainerArchiveInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \WeTheRed\DockerApi\Exception\PutContainerArchiveBadRequestException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (403 === $status) {
            throw new \WeTheRed\DockerApi\Exception\PutContainerArchiveForbiddenException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\PutContainerArchiveNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\PutContainerArchiveInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
