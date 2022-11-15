<?php

namespace App\Rules;

use App\Core\Repositories\Category\NotificationRepository;
use Illuminate\Contracts\Validation\Rule;

class CategoryIdExist implements Rule
{

    private $categoryRepository;

    public function __construct(NotificationRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function passes($attribute, $value)
    {
        return $this->categoryRepository->find($value) ? true : false;
    }


    public function message()
    {
        return 'Böyle Bir  Id Bulunamadı';
    }
}
