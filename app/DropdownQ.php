<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DropdownQ extends Model
{
    // Table Name
    protected $table = 'dropdownqs';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'dropdownq_id', 'dropdownq_name', 'survey_id'
    ];
}
