<?php

namespace WeTheRed\DockerApi\Endpoint;

class ImageCommit extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
     *
     *
     * @param \WeTheRed\DockerApi\Model\ContainerConfig $containerConfig The container configuration
     * @param array $queryParameters {
     *     @var string $container The ID or name of the container to commit
     *     @var string $repo Repository name for the created image
     *     @var string $tag Tag name for the create image
     *     @var string $comment Commit message
     *     @var string $author Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
     *     @var bool $pause Whether to pause the container before committing
     *     @var string $changes `Dockerfile` instructions to apply while committing
     * }
     */
    public function __construct(\WeTheRed\DockerApi\Model\ContainerConfig $containerConfig, array $queryParameters = [])
    {
        $this->body = $containerConfig;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'POST';
    }

    public function getUri() : string
    {
        return '/commit';
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
        $optionsResolver->setDefined(['container', 'repo', 'tag', 'comment', 'author', 'pause', 'changes']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['pause' => true]);
        $optionsResolver->setAllowedTypes('container', ['string']);
        $optionsResolver->setAllowedTypes('repo', ['string']);
        $optionsResolver->setAllowedTypes('tag', ['string']);
        $optionsResolver->setAllowedTypes('comment', ['string']);
        $optionsResolver->setAllowedTypes('author', ['string']);
        $optionsResolver->setAllowedTypes('pause', ['bool']);
        $optionsResolver->setAllowedTypes('changes', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\ImageCommitNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\ImageCommitInternalServerErrorException
     *
     * @return null|\WeTheRed\DockerApi\Model\IdResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\IdResponse', 'json');
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ImageCommitNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ImageCommitInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
