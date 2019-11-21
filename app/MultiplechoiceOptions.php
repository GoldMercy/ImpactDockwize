<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiplechoiceOptions extends Model
{
    // Table Name
    protected $table = 'multiplechoice_options';
    // Primary Key
    public $primaryKey = 'multiplechoice_id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'multiplechoice_option', 'multiplechoice_id'
    ];
}
