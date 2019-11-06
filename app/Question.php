<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function survey() {
        return $this -> belongsToMany(Survey::class);
    }

    // Table Name
    protected $table = 'questions';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'questionName', 'survey_id', 'answer_type',
    ];
}
