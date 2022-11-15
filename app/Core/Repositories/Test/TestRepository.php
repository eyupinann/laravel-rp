<?php
declare(strict_types = 1);
namespace App\Core\Repositories\Test;
use App\Core\Repositories\AbstractRepository;
use App\Models\TestType;

class TestRepository extends AbstractRepository
{

    protected function getDefaultModel(): string
    {
        return TestType::class;
    }


    public function getAll()
    {
        return $this->getQueryInstance()->get();
    }
}
