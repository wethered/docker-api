<?php

namespace WeTheRed\DockerApi\Exception;

class ContainerArchiveInfoNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Container or path does not exist', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}