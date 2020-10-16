<?php

namespace WeTheRed\DockerApi\Exception;

class ServiceCreateForbiddenException extends \RuntimeException implements ClientException
{
    private $errorResponse;

    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('network is not eligible for services', 403);
        $this->errorResponse = $errorResponse;
    }

    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
