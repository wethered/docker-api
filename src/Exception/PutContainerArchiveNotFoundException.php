<?php

namespace WeTheRed\DockerApi\Exception;

class PutContainerArchiveNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('No such container or path does not exist inside the container', 404);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}