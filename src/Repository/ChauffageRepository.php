<?php

namespace App\Repository;

use App\Entity\Chauffage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Chauffage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chauffage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chauffage[]    findAll()
 * @method Chauffage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChauffageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chauffage::class);
    }

    public function findAll()
    {
        return $this->createQueryBuilder('c')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Chauffage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
