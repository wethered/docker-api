<?php

namespace WeTheRed\DockerApi\Endpoint;

class TaskInspect extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    protected $id;

    /**
     *
     *
     * @param string $id ID of the task
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'GET';
    }

    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/tasks/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return [[], null];
    }

    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\TaskInspectNotFoundException
     * @throws \WeTheRed\DockerApi\Exception\TaskInspectInternalServerErrorException
     * @throws \WeTheRed\DockerApi\Exception\TaskInspectServiceUnavailableException
     *
     * @return null|\WeTheRed\DockerApi\Model\Task
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\Task', 'json');
        }
        if (404 === $status) {
            throw new \WeTheRed\DockerApi\Exception\TaskInspectNotFoundException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\TaskInspectInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \WeTheRed\DockerApi\Exception\TaskInspectServiceUnavailableException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
