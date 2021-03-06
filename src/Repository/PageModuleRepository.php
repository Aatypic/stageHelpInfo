<?php

namespace App\Repository;

use App\Entity\PageModule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PageModule|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageModule|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageModule[]    findAll()
 * @method PageModule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageModuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageModule::class);
    }



    /**
     * Returns all PageModule per page
     * @return void
     */
    public function getPaginatedPageModule($module, $page, $limit){
        $query = $this->createQueryBuilder('a')
        ->setFirstResult(($page * $limit) -$limit)
        ->setMaxResults($limit)
        ->where('a.modules = ?1')->setParameter(1, $module)
        ;
        return $query->getQuery()->getResult();
    }
    
    /**
     * Returns nombre total de Pages d'un Module
     * @return void
     */
    public function getTotalPageModule($module){
        $query = $this->createQueryBuilder('a')
            ->select('COUNT(a)')
            ->where('a.modules = ?1')->setParameter(1, $module)
            ;
        return $query->getQuery()->getSingleScalarResult();

    }
    // /**
    //  * @return PageModule[] Returns an array of PageModule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PageModule
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
