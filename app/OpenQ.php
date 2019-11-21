<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenQ extends Model
{
    public function survey() {
        return $this -> belongsToMany(Survey::class);
    }

    // Table Name
    protected $table = 'openqs';
    // Primary Key
    public $primaryKey = 'openq_id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'openq_name', 'survey_id'
    ];
}
