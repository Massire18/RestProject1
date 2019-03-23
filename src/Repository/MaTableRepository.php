<?php

namespace App\Repository;

use App\Entity\MaTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MaTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaTable[]    findAll()
 * @method MaTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaTableRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MaTable::class);
    }

//    /**
//     * @return MaTable[] Returns an array of MaTable objects
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
    public function findOneBySomeField($value): ?MaTable
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
