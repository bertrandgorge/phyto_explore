<?php

namespace App\Repository;

use App\Entity\YearlySubstanceUsage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method YearlySubstanceUsage|null find($id, $lockMode = null, $lockVersion = null)
 * @method YearlySubstanceUsage|null findOneBy(array $criteria, array $orderBy = null)
 * @method YearlySubstanceUsage[]    findAll()
 * @method YearlySubstanceUsage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YearlySubstanceUsageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, YearlySubstanceUsage::class);
    }

//    /**
//     * @return YearlySubstanceUsage[] Returns an array of YearlySubstanceUsage objects
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
    public function findOneBySomeField($value): ?YearlySubstanceUsage
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
