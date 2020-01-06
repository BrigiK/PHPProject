<?php

namespace App\Repository;

use App\Entity\LectureCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LectureCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method LectureCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method LectureCard[]    findAll()
 * @method LectureCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LectureCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LectureCard::class);
    }

    // /**
    //  * @return LectureCard[] Returns an array of LectureCard objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LectureCard
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
