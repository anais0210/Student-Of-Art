<?php

namespace App\Repository;

use App\Entity\UserProfil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserProfil|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserProfil|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserProfil[]    findAll()
 * @method UserProfil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepProfilository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserProfil::class);
    }

//    /**
//     * @return UserProfil[] Returns an array of UserProfil objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserProfil
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
