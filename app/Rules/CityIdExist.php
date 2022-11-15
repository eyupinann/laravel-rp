<?php

namespace App\Rules;

use App\Core\Repositories\CityRepository\CityRepository;
use Illuminate\Contracts\Validation\Rule;

class CityIdExist implements Rule
{
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }


    public function passes($attribute, $value)
    {
        return $this->cityRepository->find($value) ? true : false;
    }


    public function message()
    {
        return 'Böyle Bir  Id Bulunamadı';
    }
}
