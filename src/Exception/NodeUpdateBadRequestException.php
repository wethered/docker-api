<?php

namespace WeTheRed\DockerApi\Exception;

class NodeUpdateBadRequestException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('bad parameter', 400);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}