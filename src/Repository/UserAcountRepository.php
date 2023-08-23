<?php

namespace App\Repository;

use App\Entity\UserAcount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserAcount>
 *
 * @method UserAcount|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAcount|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAcount[]    findAll()
 * @method UserAcount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAcountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAcount::class);
    }

//    /**
//     * @return UserAcount[] Returns an array of UserAcount objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserAcount
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
