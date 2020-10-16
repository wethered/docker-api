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

class SwarmSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\SwarmSpec';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\SwarmSpec';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\SwarmSpec();
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
        }
        if (\array_key_exists('Orchestration', $data) && $data['Orchestration'] !== null) {
            $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], 'WeTheRed\\DockerApi\\Model\\SwarmSpecOrchestration', 'json', $context));
        } elseif (\array_key_exists('Orchestration', $data) && $data['Orchestration'] === null) {
            $object->setOrchestration(null);
        }
        if (\array_key_exists('Raft', $data)) {
            $object->setRaft($this->denormalizer->denormalize($data['Raft'], 'WeTheRed\\DockerApi\\Model\\SwarmSpecRaft', 'json', $context));
        }
        if (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] !== null) {
            $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], 'WeTheRed\\DockerApi\\Model\\SwarmSpecDispatcher', 'json', $context));
        } elseif (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] === null) {
            $object->setDispatcher(null);
        }
        if (\array_key_exists('CAConfig', $data) && $data['CAConfig'] !== null) {
            $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], 'WeTheRed\\DockerApi\\Model\\SwarmSpecCAConfig', 'json', $context));
        } elseif (\array_key_exists('CAConfig', $data) && $data['CAConfig'] === null) {
            $object->setCAConfig(null);
        }
        if (\array_key_exists('EncryptionConfig', $data)) {
            $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], 'WeTheRed\\DockerApi\\Model\\SwarmSpecEncryptionConfig', 'json', $context));
        }
        if (\array_key_exists('TaskDefaults', $data)) {
            $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], 'WeTheRed\\DockerApi\\Model\\SwarmSpecTaskDefaults', 'json', $context));
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if (null !== $object->getLabels()) {
            $values = [];
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if (null !== $object->getOrchestration()) {
            $data['Orchestration'] = $this->normalizer->normalize($object->getOrchestration(), 'json', $context);
        }
        if (null !== $object->getRaft()) {
            $data['Raft'] = $this->normalizer->normalize($object->getRaft(), 'json', $context);
        }
        if (null !== $object->getDispatcher()) {
            $data['Dispatcher'] = $this->normalizer->normalize($object->getDispatcher(), 'json', $context);
        }
        if (null !== $object->getCAConfig()) {
            $data['CAConfig'] = $this->normalizer->normalize($object->getCAConfig(), 'json', $context);
        }
        if (null !== $object->getEncryptionConfig()) {
            $data['EncryptionConfig'] = $this->normalizer->normalize($object->getEncryptionConfig(), 'json', $context);
        }
        if (null !== $object->getTaskDefaults()) {
            $data['TaskDefaults'] = $this->normalizer->normalize($object->getTaskDefaults(), 'json', $context);
        }

        return $data;
    }
}
