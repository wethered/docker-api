<?php

namespace WeTheRed\DockerApi\Endpoint;

class ImageBuild extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Endpoint
{
    /**
    * Build an image from a tar archive with a `Dockerfile` in it.

    The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](https://docs.docker.com/engine/reference/builder/).

    The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.

    The build is canceled if the client drops the connection by quitting or being killed.

    *
    * @param string|resource|\Psr\Http\Message\StreamInterface $inputStream A tar archive compressed with one of the following algorithms: identity (no compression), gzip, bzip2, xz.
    * @param array $queryParameters {
    *     @var string $dockerfile Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
    *     @var string $t A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
    *     @var string $extrahosts Extra hosts to add to /etc/hosts
    *     @var string $remote A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
    *     @var bool $q Suppress verbose build output.
    *     @var bool $nocache Do not use the cache when building the image.
    *     @var string $cachefrom JSON array of images used for build cache resolution.
    *     @var string $pull Attempt to pull the image even if an older image exists locally.
    *     @var bool $rm Remove intermediate containers after a successful build.
    *     @var bool $forcerm Always remove intermediate containers, even upon failure.
    *     @var int $memory Set memory limit for build.
    *     @var int $memswap Total memory (memory + swap). Set as `-1` to disable swap.
    *     @var int $cpushares CPU shares (relative weight).
    *     @var string $cpusetcpus CPUs in which to allow execution (e.g., `0-3`, `0,1`).
    *     @var int $cpuperiod The length of a CPU period in microseconds.
    *     @var int $cpuquota Microseconds of CPU time that the container can get in a CPU period.
    *     @var string $buildargs JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values.

    For example, the build arg `FOO=bar` would become `{"FOO":"bar"}` in JSON. This would result in the the query parameter `buildargs={"FOO":"bar"}`. Note that `{"FOO":"bar"}` should be URI component encoded.

    [Read more about the buildargs instruction.](https://docs.docker.com/engine/reference/builder/#arg)

    *     @var int $shmsize Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
    *     @var bool $squash Squash the resulting images layers into a single layer. *(Experimental release only.)*
    *     @var string $labels Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
    *     @var string $networkmode Sets the networking mode for the run commands during build. Supported
    standard values are: `bridge`, `host`, `none`, and `container:<name|id>`.
    Any other value is taken as a custom network's name or ID to which this
    container should connect to.

    *     @var string $platform Platform in the format os[/arch[/variant]]
    *     @var string $target Target build stage
    *     @var string $outputs BuildKit output configuration
    * }
    * @param array $headerParameters {
    *     @var string $Content-type
    *     @var string $X-Registry-Config This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.

    The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:

    ```
    {
     "docker.example.com": {
       "username": "janedoe",
       "password": "hunter2"
     },
     "https://index.docker.io/v1/": {
       "username": "mobydock",
       "password": "conta1n3rize14"
     }
    }
    ```

    Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a `https://` prefix and a `/v1/` suffix even though Docker will prefer to use the v2 registry API.

    * }
    */
    public function __construct($inputStream, array $queryParameters = [], array $headerParameters = [])
    {
        $this->body = $inputStream;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    use \Jane\OpenApiRuntime\Client\EndpointTrait;

    public function getMethod() : string
    {
        return 'POST';
    }

    public function getUri() : string
    {
        return '/build';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return [[], $this->body];
    }

    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['dockerfile', 't', 'extrahosts', 'remote', 'q', 'nocache', 'cachefrom', 'pull', 'rm', 'forcerm', 'memory', 'memswap', 'cpushares', 'cpusetcpus', 'cpuperiod', 'cpuquota', 'buildargs', 'shmsize', 'squash', 'labels', 'networkmode', 'platform', 'target', 'outputs']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['dockerfile' => 'Dockerfile', 'q' => false, 'nocache' => false, 'rm' => true, 'forcerm' => false, 'platform' => '', 'target' => '', 'outputs' => '']);
        $optionsResolver->setAllowedTypes('dockerfile', ['string']);
        $optionsResolver->setAllowedTypes('t', ['string']);
        $optionsResolver->setAllowedTypes('extrahosts', ['string']);
        $optionsResolver->setAllowedTypes('remote', ['string']);
        $optionsResolver->setAllowedTypes('q', ['bool']);
        $optionsResolver->setAllowedTypes('nocache', ['bool']);
        $optionsResolver->setAllowedTypes('cachefrom', ['string']);
        $optionsResolver->setAllowedTypes('pull', ['string']);
        $optionsResolver->setAllowedTypes('rm', ['bool']);
        $optionsResolver->setAllowedTypes('forcerm', ['bool']);
        $optionsResolver->setAllowedTypes('memory', ['int']);
        $optionsResolver->setAllowedTypes('memswap', ['int']);
        $optionsResolver->setAllowedTypes('cpushares', ['int']);
        $optionsResolver->setAllowedTypes('cpusetcpus', ['string']);
        $optionsResolver->setAllowedTypes('cpuperiod', ['int']);
        $optionsResolver->setAllowedTypes('cpuquota', ['int']);
        $optionsResolver->setAllowedTypes('buildargs', ['string']);
        $optionsResolver->setAllowedTypes('shmsize', ['int']);
        $optionsResolver->setAllowedTypes('squash', ['bool']);
        $optionsResolver->setAllowedTypes('labels', ['string']);
        $optionsResolver->setAllowedTypes('networkmode', ['string']);
        $optionsResolver->setAllowedTypes('platform', ['string']);
        $optionsResolver->setAllowedTypes('target', ['string']);
        $optionsResolver->setAllowedTypes('outputs', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Content-type', 'X-Registry-Config']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['Content-type' => 'application/x-tar']);
        $optionsResolver->setAllowedTypes('Content-type', ['string']);
        $optionsResolver->setAllowedTypes('X-Registry-Config', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \WeTheRed\DockerApi\Exception\ImageBuildBadRequestException
     * @throws \WeTheRed\DockerApi\Exception\ImageBuildInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType)
    {
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ImageBuildBadRequestException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \WeTheRed\DockerApi\Exception\ImageBuildInternalServerErrorException($serializer->deserialize($body, 'WeTheRed\\DockerApi\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes() : array
    {
        return [];
    }
}
