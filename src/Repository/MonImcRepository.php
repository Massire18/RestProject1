<?php

namespace App\Repository;

use App\Entity\MonImc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MonImc|null find($id, $lockMode = null, $lockVersion = null)
 * @method MonImc|null findOneBy(array $criteria, array $orderBy = null)
 * @method MonImc[]    findAll()
 * @method MonImc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonImcRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MonImc::class);
    }

//    /**
//     * @return MonImc[] Returns an array of MonImc objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MonImc
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
