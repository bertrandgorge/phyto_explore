<?php

namespace App\Repository;

use App\Entity\YearlyAMMUsage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method YearlyAMMUsage|null find($id, $lockMode = null, $lockVersion = null)
 * @method YearlyAMMUsage|null findOneBy(array $criteria, array $orderBy = null)
 * @method YearlyAMMUsage[]    findAll()
 * @method YearlyAMMUsage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YearlyAMMUsageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, YearlyAMMUsage::class);
    }

//    /**
//     * @return YearlyAMMUsage[] Returns an array of YearlyAMMUsage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('y.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?YearlyAMMUsage
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
