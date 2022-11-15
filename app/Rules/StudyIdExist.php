<?php

namespace App\Rules;

use App\Core\Repositories\Study\StudyRepository;
use Illuminate\Contracts\Validation\Rule;

class StudyIdExist implements Rule
{
    private $studyRepository;

    public function __construct(StudyRepository $studyRepository)
    {
        $this->studyRepository = $studyRepository;
    }


    public function passes($attribute , $value)
    {
        return $this->studyRepository->find($value) ? true : false;
    }


    public function message()
    {
        return 'Böyle Bir  Id Bulunamadı';
    }
}
