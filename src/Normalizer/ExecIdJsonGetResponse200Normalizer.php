<?php

namespace WeTheRed\DockerApi\Normalizer;

use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ExecIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\ExecIdJsonGetResponse200';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\ExecIdJsonGetResponse200';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\ExecIdJsonGetResponse200();
        if (\array_key_exists('CanRemove', $data)) {
            $object->setCanRemove($data['CanRemove']);
        }
        if (\array_key_exists('DetachKeys', $data)) {
            $object->setDetachKeys($data['DetachKeys']);
        }
        if (\array_key_exists('ID', $data)) {
            $object->setID($data['ID']);
        }
        if (\array_key_exists('Running', $data)) {
            $object->setRunning($data['Running']);
        }
        if (\array_key_exists('ExitCode', $data)) {
            $object->setExitCode($data['ExitCode']);
        }
        if (\array_key_exists('ProcessConfig', $data)) {
            $object->setProcessConfig($this->denormalizer->denormalize($data['ProcessConfig'], 'WeTheRed\\DockerApi\\Model\\ProcessConfig', 'json', $context));
        }
        if (\array_key_exists('OpenStdin', $data)) {
            $object->setOpenStdin($data['OpenStdin']);
        }
        if (\array_key_exists('OpenStderr', $data)) {
            $object->setOpenStderr($data['OpenStderr']);
        }
        if (\array_key_exists('OpenStdout', $data)) {
            $object->setOpenStdout($data['OpenStdout']);
        }
        if (\array_key_exists('ContainerID', $data)) {
            $object->setContainerID($data['ContainerID']);
        }
        if (\array_key_exists('Pid', $data)) {
            $object->setPid($data['Pid']);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getCanRemove()) {
            $data['CanRemove'] = $object->getCanRemove();
        }
        if (null !== $object->getDetachKeys()) {
            $data['DetachKeys'] = $object->getDetachKeys();
        }
        if (null !== $object->getID()) {
            $data['ID'] = $object->getID();
        }
        if (null !== $object->getRunning()) {
            $data['Running'] = $object->getRunning();
        }
        if (null !== $object->getExitCode()) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if (null !== $object->getProcessConfig()) {
            $data['ProcessConfig'] = $this->normalizer->normalize($object->getProcessConfig(), 'json', $context);
        }
        if (null !== $object->getOpenStdin()) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if (null !== $object->getOpenStderr()) {
            $data['OpenStderr'] = $object->getOpenStderr();
        }
        if (null !== $object->getOpenStdout()) {
            $data['OpenStdout'] = $object->getOpenStdout();
        }
        if (null !== $object->getContainerID()) {
            $data['ContainerID'] = $object->getContainerID();
        }
        if (null !== $object->getPid()) {
            $data['Pid'] = $object->getPid();
        }

        return $data;
    }
}
