<?php
declare(strict_types = 1);

namespace App\Core\QueryBuilder;

use Illuminate\Database\Eloquent\Builder;

class QueryBuilder implements QueryBuilderInterface
{
    private $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function getQueryBuilder(): Builder
    {
        return $this->builder;
    }

    public function nativeQuery(string $query, array $bindings = [])
    {
        return $this->builder->getConnection()->select($query, $bindings);
    }


}
