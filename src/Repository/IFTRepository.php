<?php

namespace App\Repository;

use App\Entity\IFT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IFT|null find($id, $lockMode = null, $lockVersion = null)
 * @method IFT|null findOneBy(array $criteria, array $orderBy = null)
 * @method IFT[]    findAll()
 * @method IFT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IFTRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IFT::class);
    }

//    /**
//     * @return IFT[] Returns an array of IFT objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IFT
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
