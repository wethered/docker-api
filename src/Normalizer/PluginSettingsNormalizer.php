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

class PluginSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\PluginSettings';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\PluginSettings';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\PluginSettings();
        if (\array_key_exists('Mounts', $data)) {
            $values = [];
            foreach ($data['Mounts'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'WeTheRed\\DockerApi\\Model\\PluginMount', 'json', $context);
            }
            $object->setMounts($values);
        }
        if (\array_key_exists('Env', $data)) {
            $values_1 = [];
            foreach ($data['Env'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setEnv($values_1);
        }
        if (\array_key_exists('Args', $data)) {
            $values_2 = [];
            foreach ($data['Args'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setArgs($values_2);
        }
        if (\array_key_exists('Devices', $data)) {
            $values_3 = [];
            foreach ($data['Devices'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'WeTheRed\\DockerApi\\Model\\PluginDevice', 'json', $context);
            }
            $object->setDevices($values_3);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getMounts()) {
            $values = [];
            foreach ($object->getMounts() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Mounts'] = $values;
        }
        if (null !== $object->getEnv()) {
            $values_1 = [];
            foreach ($object->getEnv() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Env'] = $values_1;
        }
        if (null !== $object->getArgs()) {
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
        }
        if (null !== $object->getDevices()) {
            $values_3 = [];
            foreach ($object->getDevices() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Devices'] = $values_3;
        }

        return $data;
    }
}
