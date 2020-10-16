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

class TaskSpecContainerSpecConfigsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecConfigsItem';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecConfigsItem';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\TaskSpecContainerSpecConfigsItem();
        if (\array_key_exists('File', $data)) {
            $object->setFile($this->denormalizer->denormalize($data['File'], 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecConfigsItemFile', 'json', $context));
        }
        if (\array_key_exists('Runtime', $data)) {
            $object->setRuntime($data['Runtime']);
        }
        if (\array_key_exists('ConfigID', $data)) {
            $object->setConfigID($data['ConfigID']);
        }
        if (\array_key_exists('ConfigName', $data)) {
            $object->setConfigName($data['ConfigName']);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getFile()) {
            $data['File'] = $this->normalizer->normalize($object->getFile(), 'json', $context);
        }
        if (null !== $object->getRuntime()) {
            $data['Runtime'] = $object->getRuntime();
        }
        if (null !== $object->getConfigID()) {
            $data['ConfigID'] = $object->getConfigID();
        }
        if (null !== $object->getConfigName()) {
            $data['ConfigName'] = $object->getConfigName();
        }

        return $data;
    }
}
