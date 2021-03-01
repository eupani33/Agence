<?php

namespace App\Repository;

use App\Entity\RechercheBien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RechercheBien|null find($id, $lockMode = null, $lockVersion = null)
 * @method RechercheBien|null findOneBy(array $criteria, array $orderBy = null)
 * @method RechercheBien[]    findAll()
 * @method RechercheBien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RechercheBienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RechercheBien::class);
    }

    // /**
    //  * @return RechercheBien[] Returns an array of RechercheBien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RechercheBien
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
