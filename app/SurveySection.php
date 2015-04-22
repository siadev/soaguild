<?php namespace soaguild;

use Illuminate\Database\Eloquent\Model;

class SurveySection extends Model {


    public function survey()
    {
        return $this->belongsTo('soaguild\Survey');
    }

}
