<?php

namespace WeTheRed\DockerApi\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TaskStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\TaskStatus';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\TaskStatus';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\TaskStatus();
        if (\array_key_exists('Timestamp', $data)) {
            $object->setTimestamp($data['Timestamp']);
        }
        if (\array_key_exists('State', $data)) {
            $object->setState($data['State']);
        }
        if (\array_key_exists('Message', $data)) {
            $object->setMessage($data['Message']);
        }
        if (\array_key_exists('Err', $data)) {
            $object->setErr($data['Err']);
        }
        if (\array_key_exists('ContainerStatus', $data)) {
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], 'WeTheRed\\DockerApi\\Model\\TaskStatusContainerStatus', 'json', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getTimestamp()) {
            $data['Timestamp'] = $object->getTimestamp();
        }
        if (null !== $object->getState()) {
            $data['State'] = $object->getState();
        }
        if (null !== $object->getMessage()) {
            $data['Message'] = $object->getMessage();
        }
        if (null !== $object->getErr()) {
            $data['Err'] = $object->getErr();
        }
        if (null !== $object->getContainerStatus()) {
            $data['ContainerStatus'] = $this->normalizer->normalize($object->getContainerStatus(), 'json', $context);
        }
        return $data;
    }
}