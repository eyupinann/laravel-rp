<?php

namespace App\Rules;

use App\Core\Repositories\StudyArea\StudyAreaRepository;
use Illuminate\Contracts\Validation\Rule;

class StudyAreaIdExist implements Rule
{
    private $studyAreaRepository;

    public function __construct(StudyAreaRepository $studyAreaRepository)
    {
        $this->studyAreaRepository = $studyAreaRepository;
    }


    public function passes($attribute , $value)
    {
        return $this->studyAreaRepository->find($value) ? true : false;
    }


    public function message()
    {
        return 'Böyle Bir Id Bulunamadı';
    }
}
