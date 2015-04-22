<?php namespace soaguild;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model {

	protected $table = 'surveys';

	protected $fillable = [
        'name', 'description', 'welcome_message',
        'exit_message', 'start_date', 'publication_date',
        'expiration_date'
    ];


    /**
     * A survey may be owned by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('soaguild\User');
    }

    public function participant()
    {
        return $this->belongsToMany('soaguild\SurveyParticipant');
    }

    public function sections()
    {
        return $this->hasMany('soaguild\SurveySection');
    }






}
