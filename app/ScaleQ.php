<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScaleQ extends Model
{
    // Table Name
    protected $table = 'scaleqs';
    // Primary Key
    public $primaryKey = 'scaleq_id';
    // Timestamps
    public $timestamps = true;    
}
