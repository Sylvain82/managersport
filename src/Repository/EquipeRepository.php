<?php

namespace App\Repository;

use App\Entity\Equipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Equipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipe[]    findAll()
 * @method Equipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipe::class);
    }

    // /**
    //  * @return Equipe[] Returns an array of Equipe objects
    //  */

    public function findByEquipe($id)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.id = :val')
            ->setParameter('val', $id)
            ->orderBy('e.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Equipe
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
