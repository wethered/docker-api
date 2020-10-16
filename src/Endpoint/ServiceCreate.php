<?php

namespace WeTheRed\DockerApi\Endpoint;

class ServiceCreate extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
    *
    *
    * @param \WeTheRed\DockerApi\Model\ServicesCreatePostBody $body
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.

    Refer to the [authentication section](#section/Authentication) for
    details.

    * }
    */
    public function __construct(\WeTheRed\DockerApi\Model\ServicesCreatePostBody $body, array $headerParameters = [])
    {
        $this->body = $body;
        $this->headerParameters = $headerParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'POST';
    }

    public function getUri() : string
    {
        return '/services/create';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }

    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getHeadersOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['X-Registry-Auth']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('X-Registry-Auth', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\ServiceCreateBadRequestException
     * @throws \WeTheRed\DockerApi\Exception\ServiceCreateForbiddenException
     * @throws \WeTheRed\DockerApi\Exception\ServiceCreateConflictException
     * @throws \WeTheRed\DockerApi\Exception\ServiceCreateInternalServerErrorException
     * @throws \WeTheRed\DockerApi\Exception\ServiceCreateServiceUnavailableException
     *
     * @return null|\WeTheRed\DockerApi\Model\ServicesCreatePostResponse201
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ServicesCreatePostResponse201', 'json');
        }
        if (400 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceCreateBadRequestException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (403 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceCreateForbiddenException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (409 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceCreateConflictException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceCreateInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceCreateServiceUnavailableException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
