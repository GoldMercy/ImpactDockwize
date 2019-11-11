<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenQ extends Model
{
    public function survey() {
        return $this -> hasOne('App\Survey', 'id');
    }

    // Table Name
    protected $table = 'openqs';
    // Primary Key
    public $primaryKey = 'openq_id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'questionName', 'survey_id', 'answer_type',
    ];
}
