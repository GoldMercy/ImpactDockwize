<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenQ extends Model
{
    // Table Name
    protected $table = 'openqs';
    // Primary Key
    public $primaryKey = 'openq_id';
    // Timestamps
    public $timestamps = true;
}
