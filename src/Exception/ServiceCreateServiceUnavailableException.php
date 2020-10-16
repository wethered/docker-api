<?php

namespace WeTheRed\DockerApi\Exception;

class ServiceCreateServiceUnavailableException extends \RuntimeException implements ServerException
{
    private $errorResponse;
    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('node is not part of a swarm', 503);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}