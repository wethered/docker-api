<?php

namespace WeTheRed\DockerApi\Exception;

class PutContainerArchiveForbiddenException extends \RuntimeException implements ClientException
{
    private $errorResponse;
    public function __construct(\WeTheRed\DockerApi\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Permission denied, the volume or container rootfs is marked as read-only.', 403);
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}