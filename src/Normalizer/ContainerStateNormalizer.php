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
class ContainerStateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'WeTheRed\\DockerApi\\Model\\ContainerState';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'WeTheRed\\DockerApi\\Model\\ContainerState';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \WeTheRed\DockerApi\Model\ContainerState();
        if (\array_key_exists('Status', $data)) {
            $object->setStatus($data['Status']);
        }
        if (\array_key_exists('Running', $data)) {
            $object->setRunning($data['Running']);
        }
        if (\array_key_exists('Paused', $data)) {
            $object->setPaused($data['Paused']);
        }
        if (\array_key_exists('Restarting', $data)) {
            $object->setRestarting($data['Restarting']);
        }
        if (\array_key_exists('OOMKilled', $data)) {
            $object->setOOMKilled($data['OOMKilled']);
        }
        if (\array_key_exists('Dead', $data)) {
            $object->setDead($data['Dead']);
        }
        if (\array_key_exists('Pid', $data)) {
            $object->setPid($data['Pid']);
        }
        if (\array_key_exists('ExitCode', $data)) {
            $object->setExitCode($data['ExitCode']);
        }
        if (\array_key_exists('Error', $data)) {
            $object->setError($data['Error']);
        }
        if (\array_key_exists('StartedAt', $data)) {
            $object->setStartedAt($data['StartedAt']);
        }
        if (\array_key_exists('FinishedAt', $data)) {
            $object->setFinishedAt($data['FinishedAt']);
        }
        if (\array_key_exists('Health', $data)) {
            $object->setHealth($this->denormalizer->denormalize($data['Health'], 'WeTheRed\\DockerApi\\Model\\Health', 'json', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getStatus()) {
            $data['Status'] = $object->getStatus();
        }
        if (null !== $object->getRunning()) {
            $data['Running'] = $object->getRunning();
        }
        if (null !== $object->getPaused()) {
            $data['Paused'] = $object->getPaused();
        }
        if (null !== $object->getRestarting()) {
            $data['Restarting'] = $object->getRestarting();
        }
        if (null !== $object->getOOMKilled()) {
            $data['OOMKilled'] = $object->getOOMKilled();
        }
        if (null !== $object->getDead()) {
            $data['Dead'] = $object->getDead();
        }
        if (null !== $object->getPid()) {
            $data['Pid'] = $object->getPid();
        }
        if (null !== $object->getExitCode()) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if (null !== $object->getError()) {
            $data['Error'] = $object->getError();
        }
        if (null !== $object->getStartedAt()) {
            $data['StartedAt'] = $object->getStartedAt();
        }
        if (null !== $object->getFinishedAt()) {
            $data['FinishedAt'] = $object->getFinishedAt();
        }
        if (null !== $object->getHealth()) {
            $data['Health'] = $this->normalizer->normalize($object->getHealth(), 'json', $context);
        }
        return $data;
    }
}