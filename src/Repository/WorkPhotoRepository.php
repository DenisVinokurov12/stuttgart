<?php

namespace App\Repository;

use App\Entity\WorkPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkPhoto>
 *
 * @method WorkPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkPhoto[]    findAll()
 * @method WorkPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkPhoto::class);
    }

//    /**
//     * @return WorkPhoto[] Returns an array of WorkPhoto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WorkPhoto
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
