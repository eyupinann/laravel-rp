<?php
namespace App\Core\Services;

use App\Models\Survey;

class SurveyService
{
    private $survey;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

    public function create(array $data)
    {
        $createData = [
            'name'      => $data['name'] ,
            'is_active' => $data['is_active']
        ];
        $this->survey->create($createData);
    }

    public function update($id , array $data)
    {
        $survey            = $this->survey->find($id);
        $survey->name      = $data['name'];
        $survey->is_active = $data['is_active'];
        $survey->save();
    }

    public function delete($id)
    {
        $survey = $this->survey->find($id);
        $survey->delete();
    }

}
