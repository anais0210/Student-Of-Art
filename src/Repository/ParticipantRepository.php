<?php

namespace App\Repository;

use App\Entity\Participant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * class Participant 
 */
class ParticipantRepository extends ServiceEntityRepository
{
    /**
     * @param RegistryInterface $registry 
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Participant::class);
    }
}
