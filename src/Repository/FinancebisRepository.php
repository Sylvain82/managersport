<?php

namespace App\Repository;

use App\Entity\Financebis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Financebis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Financebis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Financebis[]    findAll()
 * @method Financebis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinancebisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Financebis::class);
    }

    // /**
    //  * @return Financebis[] Returns an array of Financebis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Financebis
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
