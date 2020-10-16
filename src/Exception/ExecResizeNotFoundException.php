<?php

namespace WeTheRed\DockerApi\Exception;

class ExecResizeNotFoundException extends \RuntimeException implements ClientException
{
    private $errorResponse;

    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('No such exec instance', 404);
        $this->errorResponse = $errorResponse;
    }

    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
