<?php

namespace WeTheRed\DockerApi\Exception;

class VolumeListInternalServerErrorException extends \RuntimeException implements ServerException
{
    private $errorResponse;

    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Server error', 500);
        $this->errorResponse = $errorResponse;
    }

    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
