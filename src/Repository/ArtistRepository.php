<?php

namespace App\Repository;

use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\getEntityManager;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * class Artist 
 */
class ArtistRepository extends ServiceEntityRepository
{
    /**
     * @param RegistryInterface $registry 
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Artist::class);
    }
}
