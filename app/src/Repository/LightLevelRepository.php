<?php

namespace App\Repository;

use App\Entity\LightLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LightLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method LightLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method LightLevel[]    findAll()
 * @method LightLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LightLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LightLevel::class);
    }

     /**
      * @return LightLevel[] Returns an array of LightLevel objects
      */
    public function findByPlanterId($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.planter_id = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?LightLevel
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