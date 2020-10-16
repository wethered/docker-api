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
class TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\TaskSpecContainerSpecPrivilegesSELinuxContext();
        if (\array_key_exists('Disable', $data)) {
            $object->setDisable($data['Disable']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($data['User']);
        }
        if (\array_key_exists('Role', $data)) {
            $object->setRole($data['Role']);
        }
        if (\array_key_exists('Type', $data)) {
            $object->setType($data['Type']);
        }
        if (\array_key_exists('Level', $data)) {
            $object->setLevel($data['Level']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getDisable()) {
            $data['Disable'] = $object->getDisable();
        }
        if (null !== $object->getUser()) {
            $data['User'] = $object->getUser();
        }
        if (null !== $object->getRole()) {
            $data['Role'] = $object->getRole();
        }
        if (null !== $object->getType()) {
            $data['Type'] = $object->getType();
        }
        if (null !== $object->getLevel()) {
            $data['Level'] = $object->getLevel();
        }
        return $data;
    }
}