<?php

namespace WeTheRed\DockerApi\Model;

class Runtime
{
    /**
    * Name and, optional, path, of the OCI executable binary.
    
    If the path is omitted, the daemon searches the host's `$PATH` for the
    binary and uses the first result.
    
    *
    * @var string
    */
    protected $path;
    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @var string[]|null
     */
    protected $runtimeArgs;
    /**
    * Name and, optional, path, of the OCI executable binary.
    
    If the path is omitted, the daemon searches the host's `$PATH` for the
    binary and uses the first result.
    
    *
    * @return string
    */
    public function getPath() : string
    {
        return $this->path;
    }
    /**
    * Name and, optional, path, of the OCI executable binary.
    
    If the path is omitted, the daemon searches the host's `$PATH` for the
    binary and uses the first result.
    
    *
    * @param string $path
    *
    * @return self
    */
    public function setPath(string $path) : self
    {
        $this->path = $path;
        return $this;
    }
    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @return string[]|null
     */
    public function getRuntimeArgs() : ?array
    {
        return $this->runtimeArgs;
    }
    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @param string[]|null $runtimeArgs
     *
     * @return self
     */
    public function setRuntimeArgs(?array $runtimeArgs) : self
    {
        $this->runtimeArgs = $runtimeArgs;
        return $this;
    }
}