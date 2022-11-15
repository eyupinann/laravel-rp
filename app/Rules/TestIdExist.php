<?php
    namespace App\Rules;

    use App\Core\Repositories\Test\TestRepository;
    use Illuminate\Contracts\Validation\Rule;

    class TestIdExist implements Rule
    {
        private $testRepository;

        public function __construct(TestRepository $testRepository)
        {
            $this->testRepository = $testRepository;
        }


        public function passes($attribute , $value)
        {
            return $this->testRepository->find($value) ? true : false;
        }


        public function message()
        {
            return 'Böyle Bir  Id Bulunamadı';
        }
    }
