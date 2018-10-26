<?php

namespace App\Repository;

use App\Entity\Danger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Danger|null find($id, $lockMode = null, $lockVersion = null)
 * @method Danger|null findOneBy(array $criteria, array $orderBy = null)
 * @method Danger[]    findAll()
 * @method Danger[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DangerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Danger::class);
    }

//    /**
//     * @return Danger[] Returns an array of Danger objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Danger
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
