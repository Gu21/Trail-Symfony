<?php

namespace App\Repository;

use App\Entity\RegisterTrail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RegisterTrail|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegisterTrail|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegisterTrail[]    findAll()
 * @method RegisterTrail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegisterTrailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegisterTrail::class);
    }

    // /**
    //  * @return RegisterTrail[] Returns an array of RegisterTrail objects
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
    public function findOneBySomeField($value): ?RegisterTrail
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
