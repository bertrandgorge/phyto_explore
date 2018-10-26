<?php

namespace App\Repository;

use App\Entity\SubstanceQuantity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SubstanceQuantity|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubstanceQuantity|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubstanceQuantity[]    findAll()
 * @method SubstanceQuantity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubstanceQuantityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubstanceQuantity::class);
    }

//    /**
//     * @return SubstanceQuantity[] Returns an array of SubstanceQuantity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubstanceQuantity
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
