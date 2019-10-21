<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answertype extends Model
{
    // Table Name
    protected $table = 'answer_type';
    // Primary Key
    public $primaryKey = 'answer_type_id';
    // Timestamps
    public $timestamps = true;

    public function question(){
        return $this->hasMany('App\Question');
    }
}
