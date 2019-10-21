<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'Titel', 'Beschrijving'
    ];

    // Table Name
    protected $table = 'surveys';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}