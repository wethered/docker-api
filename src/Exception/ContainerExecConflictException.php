<?php

namespace WeTheRed\DockerApi\Exception;

class ContainerExecConflictException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('container is paused', 409);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}