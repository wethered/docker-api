<?php

namespace WeTheRed\DockerApi\Endpoint;

class ServiceLogs extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $id;

    /**
    * Get `stdout` and `stderr` logs from a service. See also
    [`/containers/{id}/logs`](#operation/ContainerLogs).

    **Note**: This endpoint works only for services with the `local`,
    `json-file` or `journald` logging drivers.

    *
    * @param string $id ID or name of the service
    * @param array $queryParameters {
    *     @var bool $details Show service context and extra details provided to logs.
    *     @var bool $follow Keep connection after returning logs.
    *     @var bool $stdout Return logs from `stdout`
    *     @var bool $stderr Return logs from `stderr`
    *     @var int $since Only return logs since this time, as a UNIX timestamp
    *     @var bool $timestamps Add timestamps to every log line
    *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.

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
        return str_replace(['{id}'], [$this->id], '/services/{id}/logs');
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
        $optionsResolver->setDefined(['details', 'follow', 'stdout', 'stderr', 'since', 'timestamps', 'tail']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['details' => false, 'follow' => false, 'stdout' => false, 'stderr' => false, 'since' => 0, 'timestamps' => false, 'tail' => 'all']);
        $optionsResolver->setAllowedTypes('details', ['bool']);
        $optionsResolver->setAllowedTypes('follow', ['bool']);
        $optionsResolver->setAllowedTypes('stdout', ['bool']);
        $optionsResolver->setAllowedTypes('stderr', ['bool']);
        $optionsResolver->setAllowedTypes('since', ['int']);
        $optionsResolver->setAllowedTypes('timestamps', ['bool']);
        $optionsResolver->setAllowedTypes('tail', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\ServiceLogsNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\ServiceLogsInternalServerErrorException
     * @throws \WeTheRed\DockerApi\Exception\ServiceLogsServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return json_decode($body);
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceLogsNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceLogsInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ServiceLogsServiceUnavailableException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
