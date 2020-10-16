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

class TaskSpecContainerSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpec';
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpec';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\TaskSpecContainerSpec();
        if (\array_key_exists('Image', $data)) {
            $object->setImage($data['Image']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
        }
        if (\array_key_exists('Command', $data)) {
            $values_1 = [];
            foreach ($data['Command'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCommand($values_1);
        }
        if (\array_key_exists('Args', $data)) {
            $values_2 = [];
            foreach ($data['Args'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setArgs($values_2);
        }
        if (\array_key_exists('Hostname', $data)) {
            $object->setHostname($data['Hostname']);
        }
        if (\array_key_exists('Env', $data)) {
            $values_3 = [];
            foreach ($data['Env'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setEnv($values_3);
        }
        if (\array_key_exists('Dir', $data)) {
            $object->setDir($data['Dir']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($data['User']);
        }
        if (\array_key_exists('Groups', $data)) {
            $values_4 = [];
            foreach ($data['Groups'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setGroups($values_4);
        }
        if (\array_key_exists('Privileges', $data)) {
            $object->setPrivileges($this->denormalizer->denormalize($data['Privileges'], 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecPrivileges', 'json', $context));
        }
        if (\array_key_exists('TTY', $data)) {
            $object->setTTY($data['TTY']);
        }
        if (\array_key_exists('OpenStdin', $data)) {
            $object->setOpenStdin($data['OpenStdin']);
        }
        if (\array_key_exists('ReadOnly', $data)) {
            $object->setReadOnly($data['ReadOnly']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_5 = [];
            foreach ($data['Mounts'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'WeTheRed\\DockerApi\\Model\\Mount', 'json', $context);
            }
            $object->setMounts($values_5);
        }
        if (\array_key_exists('StopSignal', $data)) {
            $object->setStopSignal($data['StopSignal']);
        }
        if (\array_key_exists('StopGracePeriod', $data)) {
            $object->setStopGracePeriod($data['StopGracePeriod']);
        }
        if (\array_key_exists('HealthCheck', $data)) {
            $object->setHealthCheck($this->denormalizer->denormalize($data['HealthCheck'], 'WeTheRed\\DockerApi\\Model\\HealthConfig', 'json', $context));
        }
        if (\array_key_exists('Hosts', $data)) {
            $values_6 = [];
            foreach ($data['Hosts'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setHosts($values_6);
        }
        if (\array_key_exists('DNSConfig', $data)) {
            $object->setDNSConfig($this->denormalizer->denormalize($data['DNSConfig'], 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecDNSConfig', 'json', $context));
        }
        if (\array_key_exists('Secrets', $data)) {
            $values_7 = [];
            foreach ($data['Secrets'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecSecretsItem', 'json', $context);
            }
            $object->setSecrets($values_7);
        }
        if (\array_key_exists('Configs', $data)) {
            $values_8 = [];
            foreach ($data['Configs'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, 'WeTheRed\\DockerApi\\Model\\TaskSpecContainerSpecConfigsItem', 'json', $context);
            }
            $object->setConfigs($values_8);
        }
        if (\array_key_exists('Isolation', $data)) {
            $object->setIsolation($data['Isolation']);
        }
        if (\array_key_exists('Init', $data) && $data['Init'] !== null) {
            $object->setInit($data['Init']);
        } elseif (\array_key_exists('Init', $data) && $data['Init'] === null) {
            $object->setInit(null);
        }
        if (\array_key_exists('Sysctls', $data)) {
            $values_9 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Sysctls'] as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $object->setSysctls($values_9);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getImage()) {
            $data['Image'] = $object->getImage();
        }
        if (null !== $object->getLabels()) {
            $values = [];
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if (null !== $object->getCommand()) {
            $values_1 = [];
            foreach ($object->getCommand() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Command'] = $values_1;
        }
        if (null !== $object->getArgs()) {
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
        }
        if (null !== $object->getHostname()) {
            $data['Hostname'] = $object->getHostname();
        }
        if (null !== $object->getEnv()) {
            $values_3 = [];
            foreach ($object->getEnv() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['Env'] = $values_3;
        }
        if (null !== $object->getDir()) {
            $data['Dir'] = $object->getDir();
        }
        if (null !== $object->getUser()) {
            $data['User'] = $object->getUser();
        }
        if (null !== $object->getGroups()) {
            $values_4 = [];
            foreach ($object->getGroups() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Groups'] = $values_4;
        }
        if (null !== $object->getPrivileges()) {
            $data['Privileges'] = $this->normalizer->normalize($object->getPrivileges(), 'json', $context);
        }
        if (null !== $object->getTTY()) {
            $data['TTY'] = $object->getTTY();
        }
        if (null !== $object->getOpenStdin()) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if (null !== $object->getReadOnly()) {
            $data['ReadOnly'] = $object->getReadOnly();
        }
        if (null !== $object->getMounts()) {
            $values_5 = [];
            foreach ($object->getMounts() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['Mounts'] = $values_5;
        }
        if (null !== $object->getStopSignal()) {
            $data['StopSignal'] = $object->getStopSignal();
        }
        if (null !== $object->getStopGracePeriod()) {
            $data['StopGracePeriod'] = $object->getStopGracePeriod();
        }
        if (null !== $object->getHealthCheck()) {
            $data['HealthCheck'] = $this->normalizer->normalize($object->getHealthCheck(), 'json', $context);
        }
        if (null !== $object->getHosts()) {
            $values_6 = [];
            foreach ($object->getHosts() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['Hosts'] = $values_6;
        }
        if (null !== $object->getDNSConfig()) {
            $data['DNSConfig'] = $this->normalizer->normalize($object->getDNSConfig(), 'json', $context);
        }
        if (null !== $object->getSecrets()) {
            $values_7 = [];
            foreach ($object->getSecrets() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['Secrets'] = $values_7;
        }
        if (null !== $object->getConfigs()) {
            $values_8 = [];
            foreach ($object->getConfigs() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $data['Configs'] = $values_8;
        }
        if (null !== $object->getIsolation()) {
            $data['Isolation'] = $object->getIsolation();
        }
        $data['Init'] = $object->getInit();
        if (null !== $object->getSysctls()) {
            $values_9 = [];
            foreach ($object->getSysctls() as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $data['Sysctls'] = $values_9;
        }

        return $data;
    }
}
