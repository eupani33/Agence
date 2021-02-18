<?php

namespace App\Repository;

use App\Entity\Bien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]    findAll()
 * @method Bien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bien::class);
    }


    // /**
    //  * @return Bien[] Returns an array of Bien objects
    //  */
    public function find_New()
    {
        return $this->isActif()
            ->orderBy('p.date_creation', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }


    // /**
    //  * @return Bien[] Returns an array of Bien objects
    //  */
    public function findAllActif()
    {
        return $this->isActif()
            ->orderBy('p.date_creation', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    private function isActif()
    {
        return $this->createQueryBuilder('p')
            ->Where('p.actif = true');
    }


    /*
    public function findOneBySomeField($value): ?Bien
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
