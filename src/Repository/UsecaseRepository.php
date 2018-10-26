<?php

namespace App\Repository;

use App\Entity\Usecase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Usecase|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usecase|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usecase[]    findAll()
 * @method Usecase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsecaseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usecase::class);
    }

//    /**
//     * @return Usecase[] Returns an array of Usecase objects
//     */
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
    public function findOneBySomeField($value): ?Usecase
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
