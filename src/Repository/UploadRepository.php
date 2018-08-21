<?php

namespace App\Repository;

use App\Entity\Artist;
use App\Entity\Upload;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\createQueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * class Upload
 * @method Upload[]    findBy
 */
class UploadRepository extends ServiceEntityRepository
{
    /**
     * @param  RegistryInterface $registry
     * @method Upload[]    findBy
     * @return result
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Upload::class);
    }

    /**
     * @param string $category
     * @return Result
     */
    public function findByCategory(string $category)
    {

        $queryBuilder = $this->createQueryBuilder('u');
        $queryBuilder
        ->where('u.category = :category')
        ->setParameter('categorie', $category)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /** 
     * @param Artist $artist
     * @method Upload[]    findBy
     * @return result
     */
    public function findByArtist(Artist $artist)
    {
        $queryBuilder = $this->createQueryBuilder('u');

        $queryBuilder
            ->where('u.artist = :artist')
            ->setParameter('artist', $artist)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

}