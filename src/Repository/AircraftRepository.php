<?php

namespace App\Repository;

use App\Entity\Aircraft;
use App\Entity\AirCraftCategory;
use App\Entity\AircraftManufacturer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Aircraft>
 */
class AircraftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aircraft::class);
    }

        /**
         * @return Aircraft[] Returns an array of Aircraft objects
         */
        public function findByCategory($value): array
        {
            return $this->createQueryBuilder('a')
                ->andWhere('a.aircraftCategory = :val')
                ->setParameter('val', $value)
                ->orderBy('a.id', 'ASC')
                ->getQuery()
                ->getResult()
            ;
        }

        public function findOneBySlug($value): ?Aircraft
        {
            return $this->createQueryBuilder('a')
                ->andWhere('a.slug = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }

    public function findByFilters(array $filters): array
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.isPublished = true');

        if (!empty($filters['categories'])) {
            $qb->andWhere('a.aircraftCategory IN (:categories)')
                ->setParameter('categories', $filters['categories']);
        }

        if (!empty($filters['manufacturers'])) {
            $qb->andWhere('a.aircraftManufacturer IN (:manufacturers)')
                ->setParameter('manufacturers', $filters['manufacturers']);
        }

        if (!empty($filters['min_year'])) {
            $qb->andWhere('a.yearOfManufacturer >= :min_year')
                ->setParameter('min_year', $filters['min_year']);
        }

        if (!empty($filters['max_year'])) {
            $qb->andWhere('a.yearOfManufacturer <= :max_year')
                ->setParameter('max_year', $filters['max_year']);
        }

        if (!empty($filters['min_price'])) {
            $qb->andWhere('a.price >= :min_price')
                ->setParameter('min_price', $filters['min_price']);
        }

        if (!empty($filters['max_price'])) {
            $qb->andWhere('a.price <= :max_price')
                ->setParameter('max_price', $filters['max_price']);
        }

        if (!empty($filters['min_hour'])) {
            $qb->andWhere('a.totalHours >= :min_hour')
                ->setParameter('min_hour', $filters['min_hour']);
        }

        if (!empty($filters['max_hour'])) {
            $qb->andWhere('a.totalHours <= :max_hour')
                ->setParameter('max_hour', $filters['max_hour']);
        }


        if (!empty($filters['min_date'])) {
            $qb->andWhere('a.publishedAt >= :min_date')
                ->setParameter('min_date', new \DateTime($filters['min_date']));
        }

        if (!empty($filters['max_date'])) {
            $qb->andWhere('a.publishedAt <= :max_date')
                ->setParameter('max_date', new \DateTime($filters['max_date']));
        }

        if (!empty($filters['status'])) {
            $qb->andWhere('a.status IN (:status)')
                ->setParameter('status', $filters['status']);
        }

        if (!empty($filters['registration_number'])) {
            $qb->andWhere('a.registrationNumber LIKE :registration_number')
                ->setParameter('registration_number', '%'.$filters['registration_number'].'%');
        }

        return $qb->getQuery()->getResult();
    }

    public function findByMainSearch(?AirCraftCategory $category, ?AircraftManufacturer $manufacturer, ?string $model): array
    {
        $qb = $this->createQueryBuilder('a');

        if ($category) {
            $qb->andWhere('a.aircraftCategory = :category')
                ->setParameter('category', $category);
        }

        if ($manufacturer) {
            $qb->andWhere('a.aircraftManufacturer = :manufacturer')
                ->setParameter('manufacturer', $manufacturer);
        }

        if ($model) {
            $qb->andWhere('LOWER(a.model) LIKE :model')
                ->setParameter('model', '%' . strtolower($model) . '%');
        }

        return $qb->orderBy('a.publishedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

}
