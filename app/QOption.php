<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QOption extends Model
{
    // Table Name
    protected $table = 'qoptions';
    // Primary Key
    public $primaryKey = 'qoption_id';
    // Timestamps
    public $timestamps = true;
}
