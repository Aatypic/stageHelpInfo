<?php

namespace App\Repository;

use App\Entity\LigneQuizz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LigneQuizz|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneQuizz|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneQuizz[]    findAll()
 * @method LigneQuizz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneQuizzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneQuizz::class);
    }

    // /**
    //  * @return LigneQuizz[] Returns an array of LigneQuizz objects
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
    public function findOneBySomeField($value): ?LigneQuizz
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
