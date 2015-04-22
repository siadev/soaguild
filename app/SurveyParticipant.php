<?php namespace soaguild;

use Illuminate\Database\Eloquent\Model;

class SurveyParticipant extends Model {

	protected $table = 'survey_participants';

    protected $fillable = ['userid', 'participation_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function survey()
    {
        return $this->hasMany('soaguild\Survey');
    }

}
