<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScaleQ extends Model
{
    protected $fillable = [ 'scaleq_id', 'scaleq_name', 'survey_id', 'scaleq_score'];

    // Table Name
    protected $table = 'scaleqs';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;    
}
