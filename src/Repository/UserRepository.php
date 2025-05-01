<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

        /**
         * @return User[] Returns an array of User objects
         */
        public function findAdmin(): array
        {
            return $this->createQueryBuilder('u')
                ->andWhere('u.roles LIKE :role')
                ->setParameter('role', '%"ROLE_ADMIN"%')
                ->getQuery()
                ->getResult()
            ;
        }
    public function findNonVerifyUsers(): QueryBuilder
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.roles NOT LIKE :role')
            ->andWhere('u.isVerified = :isVerify')
            ->setParameter('role', '%"ROLE_ADMIN"%')
            ->setParameter('isVerify', false)

            ;
    }

    public function findVerifyUsers(): QueryBuilder
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.roles NOT LIKE :role')
            ->andWhere('u.isVerified = :isVerify')
            ->setParameter('role', '%"ROLE_ADMIN"%')
            ->setParameter('isVerify', true)
            ;
    }

    public function searchUserVerifyUsersByPseudoOrMail($value): QueryBuilder
    {
        $queryBuilder =  $this->createQueryBuilder('u');
        $queryBuilder
            ->where('u.roles NOT LIKE :role')
            ->andWhere('u.isVerified = :isVerify')
            ->andWhere($queryBuilder->expr()->orX(
                $queryBuilder->expr()->like('u.pseudo', ':value'),
                $queryBuilder->expr()->like('u.email', ':value')
            ))
            ->setParameter('role', '%"ROLE_ADMIN"%')
            ->setParameter('isVerify', true)
            ->setParameter('value', $value)
            ;

        return $queryBuilder;
    }
    public function searchUserNonVerifyUsersByPseudoOrMail($value): QueryBuilder
    {
        $queryBuilder =  $this->createQueryBuilder('u');
        $queryBuilder
            ->where('u.roles NOT LIKE :role')
            ->andWhere('u.isVerified = :isVerify')
            ->andWhere($queryBuilder->expr()->orX(
                $queryBuilder->expr()->like('u.pseudo', ':value'),
                $queryBuilder->expr()->like('u.email', ':value')
            ))
            ->setParameter('role', '%"ROLE_ADMIN"%')
            ->setParameter('isVerify', false)
            ->setParameter('value', $value)
        ;

        return $queryBuilder;
    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
