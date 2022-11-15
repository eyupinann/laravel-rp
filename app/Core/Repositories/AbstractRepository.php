<?php
declare(strict_types = 1);

namespace App\Core\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Core\QueryBuilder\QueryBuilder;


abstract class AbstractRepository
{

    private $defaultModel;
    private $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    protected function __find($id, Model $model): ?Collection
    {
        $primaryKey = $model->getKeyName();
        return $this->__findByField($primaryKey, $id, $model);
    }

    protected function __findByField(string $field, $value, Model $model): ?Collection
    {
        $result = $model->newQuery()->where($field, "=",
            $value)->first();
        return $result ? collect($result) : null;
    }

    protected function __findIn(array $ids, Model $model): Collection
    {
        $primaryKey = $model->getKeyName();
        return $this->__findInByField($primaryKey, $ids, $model);
    }

    protected function __findInByField(string $field, array $values, Model $model): Collection
    {
        return $model->newQuery()->whereIn($field, $values)->get();
    }

    public function find($id): ?Collection
    {
        return $this->__find($id, $this->getDefaultModelInstance());
    }

    public function findByField(string $field, $value): ?Collection
    {
        return $this->__findByField($field, $value, $this->getDefaultModelInstance());
    }

    public function findIn(array $ids): Collection
    {
        return $this->__findIn($ids, $this->getDefaultModelInstance());
    }

    public function findInByField(string $field, array $values): Collection
    {
        return $this->__findInByField($field, $values, $this->getDefaultModelInstance());
    }

    protected function getDefaultModelInstance(): Model
    {
        $this->setDefaultModel($this->getDefaultModel());
        return $this->defaultModel;
    }

    protected function getQueryInstance(): Builder
    {
        return $this->getDefaultModelInstance()->newQuery();
    }

    protected function setDefaultModel(string $className)
    {
        if( ! $this->defaultModel ){
            $this->defaultModel = new $className;
        }
    }

    abstract protected function getDefaultModel(): string;

}
