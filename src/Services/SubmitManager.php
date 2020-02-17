<?php


namespace App\Services;


use App\Entity\AirConditioning;
use App\Entity\Light;
use App\Entity\Shutter;
use Doctrine\ORM\EntityManagerInterface;

class SubmitManager
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function save(array $data): void
    {

        if (isset($data['brightness'])) {
            $this->addOrUpdate(Light::class, 'brightness', $data['brightness']);
        }
        if (isset($data['shutter'])) {
            $this->addOrUpdate(Shutter::class, 'state', $data['shutter']);
        }
        if (isset($data['air'])) {
            $mode = $data['air']['mode'];
            $limitMax = $data['air']['limit_max'];
            $limitMin = $data['air']['limit_min'];

            $airs = $this->em->getRepository(AirConditioning::class)->findAll();
            if ($airs) {
                $air = $airs[0];
            } else {
                $air = new AirConditioning();
            }

            $air->setMode($mode);
            $air->setLimitMin($limitMin);
            $air->setLimitMax($limitMax);

            $this->em->persist($air);
        }

        $this->em->flush();
    }

    private function addOrUpdate($entity, $method, $value): void
    {
        $entities = $this->em->getRepository($entity)->findAll();
        if ($entities) {
            $object = $entities[0];
        } else {
            $object = new $entity();
        }

        $object->{ 'set'.ucfirst($method) }($value);
        $this->em->persist($object);
    }
}