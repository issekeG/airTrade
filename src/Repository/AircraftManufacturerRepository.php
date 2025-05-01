<?php

namespace App\Repository;

use App\Entity\AircraftManufacturer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AircraftManufacturer>
 */
class AircraftManufacturerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AircraftManufacturer::class);
    }

    //    /**
    //     * @return AircraftManufacturer[] Returns an array of AircraftManufacturer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    public function findAllQueryBuilder(): QueryBuilder{
        return $this->createQueryBuilder('aircraftManufacturer');
    }


        public function findOneByName($value): QueryBuilder
        {
            return $this->createQueryBuilder('a')
                ->andWhere('LOWER(a.name) LIKE :val')
                ->setParameter('val', '%' . strtolower(trim($value)) . '%')
            ;
        }
}
