<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

        /**
         * @return Article[] Returns an array of Article objects
         */
        public function findAllArticle(): QueryBuilder
        {
            return $this->createQueryBuilder('a')
                ->orderBy('a.publishedAt', 'ASC')

            ;
        }
        public function findByLanguage($value): QueryBuilder
        {
            return $this->createQueryBuilder('a')
                ->where('a.langue = :value')
                ->setParameter('value', $value)
                ->orderBy('a.publishedAt', 'ASC')

            ;
        }
        public function findByCategory($value): QueryBuilder
        {
            return $this->createQueryBuilder('a')
                ->where('a.category = :value')
                ->setParameter('value', $value)
                ->orderBy('a.publishedAt', 'ASC')
                ;
        }

    //    public function findOneBySomeField($value): ?Article
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
