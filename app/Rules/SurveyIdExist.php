<?php

namespace App\Rules;

use App\Core\Repositories\SurveyRepository\SurveyRepository;
use Illuminate\Contracts\Validation\Rule;

class SurveyIdExist implements Rule
{
    private $surveyRepository;

    public function __construct(SurveyRepository $surveyRepository )
    {
        $this->surveyRepository = $surveyRepository;
    }


    public function passes($attribute , $value)
    {
        return $this->surveyRepository->find($value) ? true : false;
    }


    public function message()
    {
        return 'Böyle Bir  Id Bulunamadı';
    }
}
