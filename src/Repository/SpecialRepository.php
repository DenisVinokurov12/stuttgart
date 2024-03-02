<?php

namespace App\Repository;

use App\Entity\Special;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Special>
 *
 * @method Special|null find($id, $lockMode = null, $lockVersion = null)
 * @method Special|null findOneBy(array $criteria, array $orderBy = null)
 * @method Special[]    findAll()
 * @method Special[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Special::class);
    }

//    /**
//     * @return Special[] Returns an array of Special objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Special
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
