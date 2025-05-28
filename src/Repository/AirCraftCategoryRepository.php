<?php

namespace App\Repository;

use App\Entity\Aircraft;
use App\Entity\AirCraftCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AirCraftCategory>
 */
class AirCraftCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AirCraftCategory::class);
    }



    public function findCategoriesWithAircraftCount(): array
    {
        $categories = $this->findAll();

        foreach ($categories as $category) {
            $count = $this->_em->getRepository(Aircraft::class)->count(['category' => $category]);
            // on ajoute dynamiquement une propriété
            $category->aircraftCount = $count;
        }

        return $categories;
    }


    public function findAllQueryBuilder():QueryBuilder
    {
        return $this->createQueryBuilder('c');
    }

    //    /**
    //     * @return AirCraftCategory[] Returns an array of AirCraftCategory objects
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

    //    public function findOneBySomeField($value): ?AirCraftCategory
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
