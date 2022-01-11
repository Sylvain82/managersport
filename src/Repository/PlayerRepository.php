<?php

namespace App\Repository;

use App\Entity\Player;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Player|null find($id, $lockMode = null, $lockVersion = null)
 * @method Player|null findOneBy(array $criteria, array $orderBy = null)
 * @method Player[]    findAll()
 * @method Player[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }

    //  * @return Player[] Returns an array of Player objects

//
//    public function findByTeam($team)
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.team = :team')
//            ->setParameter('team', $team)
//            ->orderBy('p.id', 'ASC')
//            ->getQuery()
//            ->getResult()
//        ;
//    }
//
//
//    public function findOneByBirth($dateNaissance): ?Player
//    {
//        return $this->createQueryBuilder('player')
//            ->andWhere('player.dateNaissance = :val')
//            ->setParameter('val', $dateNaissance)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}
