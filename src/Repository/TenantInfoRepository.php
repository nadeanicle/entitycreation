<?php

namespace App\Repository;

use App\Entity\TenantInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TenantInfo>
 *
 * @method TenantInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TenantInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TenantInfo[]    findAll()
 * @method TenantInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TenantInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TenantInfo::class);
    }

//    /**
//     * @return TenantInfo[] Returns an array of TenantInfo objects
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

//    public function findOneBySomeField($value): ?TenantInfo
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
