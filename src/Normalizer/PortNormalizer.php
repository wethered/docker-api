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
class PortNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\Port';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\Port';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\Port();
        if (\array_key_exists('IP', $data)) {
            $object->setIP($data['IP']);
        }
        if (\array_key_exists('PrivatePort', $data)) {
            $object->setPrivatePort($data['PrivatePort']);
        }
        if (\array_key_exists('PublicPort', $data)) {
            $object->setPublicPort($data['PublicPort']);
        }
        if (\array_key_exists('Type', $data)) {
            $object->setType($data['Type']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getIP()) {
            $data['IP'] = $object->getIP();
        }
        if (null !== $object->getPrivatePort()) {
            $data['PrivatePort'] = $object->getPrivatePort();
        }
        if (null !== $object->getPublicPort()) {
            $data['PublicPort'] = $object->getPublicPort();
        }
        if (null !== $object->getType()) {
            $data['Type'] = $object->getType();
        }
        return $data;
    }
}