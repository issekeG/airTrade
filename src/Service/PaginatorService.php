<?php

namespace App\Service;

use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;

class PaginatorService
{
    private PaginatorInterface $paginator;

    public function __construct(PaginatorInterface $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Paginer un QueryBuilder
     *
     * @param QueryBuilder $queryBuilder
     * @param Request $request
     * @param int $limit
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function paginate(QueryBuilder $queryBuilder, Request $request, int $limit = 10)
    {
        return $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            $limit
        );
    }
}

