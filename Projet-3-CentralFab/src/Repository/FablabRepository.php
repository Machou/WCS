<?php

namespace App\Repository;

use App\Entity\Fablab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fablab|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fablab|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fablab[]    findAll()
 * @method Fablab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FablabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fablab::class);
    }

    // /**
    //  * @return Fablab[] Returns an array of Fablab objects
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
    public function findOneBySomeField($value): ?Fablab
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
