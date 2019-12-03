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
    public $primaryKey = 'oid';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'openq_id', 'openq_name', 'survey_id'
    ];
}
