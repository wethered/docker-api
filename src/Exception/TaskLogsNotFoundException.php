<?php

namespace WeTheRed\DockerApi\Exception;

class TaskLogsNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;

    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('no such task', 404);
        $this->errorResponse = $errorResponse;
    }

    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
