<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiplechoice extends Model
{
    // Table Name
    protected $table = 'multiplechoice';
    // Primary Key
    public $primaryKey = 'multiplechoice_id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'multiplechoice_name', 'survey_id'
    ];
}
