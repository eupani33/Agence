<?php

namespace App\Repository;

use App\Entity\Bien;
use App\Entity\Option;
use App\Entity\RechercheBien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Migrations\Query\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bien[]  findAll()
 * @method Bien[]  find_All()
 * @method Bien[]  findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
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
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /**
    * @return Bien[] Returns an array of Bien objects
    */

    public function find_New()
    {
        return $this->findActif()
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    public function findActif()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p . actif = true');
    }

    /**
     * @return Query
     */

    public function find_Query(RechercheBien $recherche)
    {
        $query = $this->findActif();

        if ($recherche->getPrixMax()) {
            $query = $query
                ->andWhere('p.prix <= :prixmax')
                ->setParameter('prixmax', $recherche->getPrixMax());
        }


        if ($recherche->getSurfaceMin()) {
            $query = $query
                ->andWhere('p.surface <= :surfacexmin')
                ->setParameter('surfacexmin', $recherche->getSurfaceMin());
        }


        if ($recherche->getOptions()->count() > 0) {
            $k = 0;
            foreach ($recherche->getOptions() as $k => $option) {
                $k++;
                 $query = $query
                    ->andWhere(":option$k MEMBER p.options")
                    ->setParameter("option$k", $option);
            }
        }

        return $query->getQuery();
    }

    public function find_All()
    {
        return $this->findActif()
            ->getQuery()
            ->getResult();
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
