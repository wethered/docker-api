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

class TaskSpecContainerSpecDNSConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecDNSConfig';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecDNSConfig';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\TaskSpecContainerSpecDNSConfig();
        if (\array_key_exists('Nameservers', $data) && null !== $data['Nameservers']) {
            $values = [];
            foreach ($data['Nameservers'] as $value) {
                $values[] = $value;
            }
            $object->setNameservers($values);
        }
        if (\array_key_exists('Search', $data) && null !== $data['Search']) {
            $values_1 = [];
            foreach ($data['Search'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setSearch($values_1);
        }
        if (\array_key_exists('Options', $data) && null !== $data['Options']) {
            $values_2 = [];
            foreach ($data['Options'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setOptions($values_2);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getNameservers()) {
            $values = [];
            foreach ($object->getNameservers() as $value) {
                $values[] = $value;
            }
            $data['Nameservers'] = $values;
        }
        if (null !== $object->getSearch()) {
            $values_1 = [];
            foreach ($object->getSearch() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Search'] = $values_1;
        }
        if (null !== $object->getOptions()) {
            $values_2 = [];
            foreach ($object->getOptions() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Options'] = $values_2;
        }

        return $data;
    }
}
