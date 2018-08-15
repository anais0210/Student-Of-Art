<?php

namespace App\Repository;

use App\Entity\Upload;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\createQueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Upload|null find($id, $lockMode = null, $lockVersion = null)
 * @method Upload|null findOneBy(array $criteria, array $orderBy = null)
 * @method Upload[]    findAll()
 * @method Upload[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadRepository extends ServiceEntityRepository
{
    /**
     * @param  RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Upload::class);
    }

    public function findByCategory(string $category)
    {

	    $queryBuilder = $this->createQueryBuilder('u');
	    
	    $queryBuilder
	    	->where('u.category = :category')
	    	->setParameter('categorie', $category)
	    ;

	    return $queryBuilder->getQuery()->getResult();
    }
}