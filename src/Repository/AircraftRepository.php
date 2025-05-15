<?php

namespace App\Repository;

use App\Entity\Aircraft;
use App\Entity\AirCraftCategory;
use App\Entity\AircraftManufacturer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
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


        public function findByCategory($value): QueryBuilder
        {
            return $this->createQueryBuilder('a')
                ->andWhere('a.aircraftCategory = :val')
                ->setParameter('val', $value)
                ->orderBy('a.id', 'ASC')
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

    public function findByFilters(array $filters): QueryBuilder
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

        return $qb->orderBy('a.publishedAt', 'DESC');
    }

    public function findByMainSearch(?AirCraftCategory $category, ?AircraftManufacturer $manufacturer, ?string $model): QueryBuilder
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.isPublished = true');

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

        return $qb->orderBy('a.publishedAt', 'DESC');

    }

    public function findAllAircraft():QueryBuilder{
        return $this->createQueryBuilder('a')
            ->where('a.isPublished = true')
            ->orderBy('a.publishedAt', 'DESC');
    }

    public function findAllReported():QueryBuilder{
            return $this->createQueryBuilder('a')
                ->where('a.isReported = true')
                ->orderBy('a.publishedAt', 'DESC');
    }

    public function findAllBlocked():QueryBuilder{
            return $this->createQueryBuilder('a')
                ->where('a.isPublished = false')
                ->orderBy('a.publishedAt', 'DESC');
    }
    public function moyenneAnnoncesPerCategory(): float
    {
        $entityManager = $this->getEntityManager();

        // Total d'annonces
        $totalAnnonces = (int) $entityManager->createQueryBuilder()
            ->select('COUNT(a.id)')
            ->from('App\Entity\Aircraft', 'a')
            ->getQuery()
            ->getSingleScalarResult();

        // Nombre de catégories ayant au moins une annonce
        $totalCategories = (int) $entityManager->createQueryBuilder()
            ->select('COUNT(DISTINCT c.id)')
            ->from('App\Entity\Aircraft', 'a')
            ->join('a.aircraftCategory', 'c')
            ->getQuery()
            ->getSingleScalarResult();

        if ($totalCategories === 0) {
            return 0;
        }

        return $totalAnnonces / $totalCategories;
    }


    public function countAircraftPerCategory(): array
    {
        return $this->createQueryBuilder('a')
            ->select('c.name AS category, COUNT(a.id) AS nombreAircraft')
            ->join('a.aircraftCategory', 'c')
            ->groupBy('c.id')
            ->getQuery()
            ->getResult();
    }

    public function findLast4Aircraft():array{
        return $this->createQueryBuilder('a')
            ->where('a.isPublished = true')
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();

    }

}
