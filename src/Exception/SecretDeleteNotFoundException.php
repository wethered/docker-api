<?php

namespace WeTheRed\DockerApi\Exception;

class SecretDeleteNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;

    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('secret not found', 404);
        $this->errorResponse = $errorResponse;
    }

    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
