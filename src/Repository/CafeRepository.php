<?php

namespace App\Repository;

use App\Entity\Cafe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeCafe>
 *
 * @method TypeCafe|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeCafe|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeCafe[]    findAll()
 * @method TypeCafe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CafeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cafe::class);
    }

//    /**
//     * @return Cafe[] Returns an array of Cafe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cafe
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
