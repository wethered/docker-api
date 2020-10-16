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

class PluginConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\PluginConfig';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\PluginConfig';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\PluginConfig();
        if (\array_key_exists('DockerVersion', $data)) {
            $object->setDockerVersion($data['DockerVersion']);
        }
        if (\array_key_exists('Description', $data)) {
            $object->setDescription($data['Description']);
        }
        if (\array_key_exists('Documentation', $data)) {
            $object->setDocumentation($data['Documentation']);
        }
        if (\array_key_exists('Interface', $data)) {
            $object->setInterface($this->denormalizer->denormalize($data['Interface'], 'WeTheRed\\DockerApi\\Model\\PluginConfigInterface', 'json', $context));
        }
        if (\array_key_exists('Entrypoint', $data)) {
            $values = [];
            foreach ($data['Entrypoint'] as $value) {
                $values[] = $value;
            }
            $object->setEntrypoint($values);
        }
        if (\array_key_exists('WorkDir', $data)) {
            $object->setWorkDir($data['WorkDir']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($this->denormalizer->denormalize($data['User'], 'WeTheRed\\DockerApi\\Model\\PluginConfigUser', 'json', $context));
        }
        if (\array_key_exists('Network', $data)) {
            $object->setNetwork($this->denormalizer->denormalize($data['Network'], 'WeTheRed\\DockerApi\\Model\\PluginConfigNetwork', 'json', $context));
        }
        if (\array_key_exists('Linux', $data)) {
            $object->setLinux($this->denormalizer->denormalize($data['Linux'], 'WeTheRed\\DockerApi\\Model\\PluginConfigLinux', 'json', $context));
        }
        if (\array_key_exists('PropagatedMount', $data)) {
            $object->setPropagatedMount($data['PropagatedMount']);
        }
        if (\array_key_exists('IpcHost', $data)) {
            $object->setIpcHost($data['IpcHost']);
        }
        if (\array_key_exists('PidHost', $data)) {
            $object->setPidHost($data['PidHost']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_1 = [];
            foreach ($data['Mounts'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'WeTheRed\\DockerApi\\Model\\PluginMount', 'json', $context);
            }
            $object->setMounts($values_1);
        }
        if (\array_key_exists('Env', $data)) {
            $values_2 = [];
            foreach ($data['Env'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'WeTheRed\\DockerApi\\Model\\PluginEnv', 'json', $context);
            }
            $object->setEnv($values_2);
        }
        if (\array_key_exists('Args', $data)) {
            $object->setArgs($this->denormalizer->denormalize($data['Args'], 'WeTheRed\\DockerApi\\Model\\PluginConfigArgs', 'json', $context));
        }
        if (\array_key_exists('rootfs', $data)) {
            $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], 'WeTheRed\\DockerApi\\Model\\PluginConfigRootfs', 'json', $context));
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getDockerVersion()) {
            $data['DockerVersion'] = $object->getDockerVersion();
        }
        if (null !== $object->getDescription()) {
            $data['Description'] = $object->getDescription();
        }
        if (null !== $object->getDocumentation()) {
            $data['Documentation'] = $object->getDocumentation();
        }
        if (null !== $object->getInterface()) {
            $data['Interface'] = $this->normalizer->normalize($object->getInterface(), 'json', $context);
        }
        if (null !== $object->getEntrypoint()) {
            $values = [];
            foreach ($object->getEntrypoint() as $value) {
                $values[] = $value;
            }
            $data['Entrypoint'] = $values;
        }
        if (null !== $object->getWorkDir()) {
            $data['WorkDir'] = $object->getWorkDir();
        }
        if (null !== $object->getUser()) {
            $data['User'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
        }
        if (null !== $object->getNetwork()) {
            $data['Network'] = $this->normalizer->normalize($object->getNetwork(), 'json', $context);
        }
        if (null !== $object->getLinux()) {
            $data['Linux'] = $this->normalizer->normalize($object->getLinux(), 'json', $context);
        }
        if (null !== $object->getPropagatedMount()) {
            $data['PropagatedMount'] = $object->getPropagatedMount();
        }
        if (null !== $object->getIpcHost()) {
            $data['IpcHost'] = $object->getIpcHost();
        }
        if (null !== $object->getPidHost()) {
            $data['PidHost'] = $object->getPidHost();
        }
        if (null !== $object->getMounts()) {
            $values_1 = [];
            foreach ($object->getMounts() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Mounts'] = $values_1;
        }
        if (null !== $object->getEnv()) {
            $values_2 = [];
            foreach ($object->getEnv() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Env'] = $values_2;
        }
        if (null !== $object->getArgs()) {
            $data['Args'] = $this->normalizer->normalize($object->getArgs(), 'json', $context);
        }
        if (null !== $object->getRootfs()) {
            $data['rootfs'] = $this->normalizer->normalize($object->getRootfs(), 'json', $context);
        }

        return $data;
    }
}
