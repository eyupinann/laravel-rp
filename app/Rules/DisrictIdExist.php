<?php

namespace App\Rules;

use App\Core\Repositories\DisrictRepository\DisrictRepository;
use Illuminate\Contracts\Validation\Rule;

class DisrictIdExist implements Rule
{
    private $districtRepository;

    public function __construct(DisrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }


    public function passes($attribute, $value)
    {
        return $this->districtRepository->find($value) ? true : false;
    }


    public function message()
    {
        return 'Böyle Bir  Id Bulunamadı';
    }
}
