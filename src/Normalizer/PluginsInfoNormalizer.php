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
class PluginsInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\PluginsInfo';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\PluginsInfo';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\PluginsInfo();
        if (\array_key_exists('Volume', $data)) {
            $values = array();
            foreach ($data['Volume'] as $value) {
                $values[] = $value;
            }
            $object->setVolume($values);
        }
        if (\array_key_exists('Network', $data)) {
            $values_1 = array();
            foreach ($data['Network'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setNetwork($values_1);
        }
        if (\array_key_exists('Authorization', $data)) {
            $values_2 = array();
            foreach ($data['Authorization'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setAuthorization($values_2);
        }
        if (\array_key_exists('Log', $data)) {
            $values_3 = array();
            foreach ($data['Log'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setLog($values_3);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getVolume()) {
            $values = array();
            foreach ($object->getVolume() as $value) {
                $values[] = $value;
            }
            $data['Volume'] = $values;
        }
        if (null !== $object->getNetwork()) {
            $values_1 = array();
            foreach ($object->getNetwork() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Network'] = $values_1;
        }
        if (null !== $object->getAuthorization()) {
            $values_2 = array();
            foreach ($object->getAuthorization() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Authorization'] = $values_2;
        }
        if (null !== $object->getLog()) {
            $values_3 = array();
            foreach ($object->getLog() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['Log'] = $values_3;
        }
        return $data;
    }
}