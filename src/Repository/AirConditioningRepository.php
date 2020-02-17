<?php

namespace App\Repository;

use App\Entity\AirConditioning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AirConditioning|null find($id, $lockMode = null, $lockVersion = null)
 * @method AirConditioning|null findOneBy(array $criteria, array $orderBy = null)
 * @method AirConditioning[]    findAll()
 * @method AirConditioning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AirConditioningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AirConditioning::class);
    }

    // /**
    //  * @return AirConditioning[] Returns an array of AirConditioning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AirConditioning
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
