<?php
declare(strict_types = 1);

namespace App\Core\QueryBuilder;

use Illuminate\Database\Eloquent\Builder;

interface QueryBuilderInterface
{
    public function __construct(Builder $builder);

    public function getQueryBuilder():Builder;

    public function nativeQuery(string $query, array $bindgins = []);
}
