<?php

namespace App\Repository;

use App\Entity\Volunteers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Volunteers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Volunteers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Volunteers[]    findAll()
 * @method Volunteers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolunteersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Volunteers::class);
    }

    // /**
    //  * @return Volunteers[] Returns an array of Volunteers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Volunteers
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
