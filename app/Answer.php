<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['request'];

    protected $primaryKey = 'id';
    protected $table = 'answers';
    public $timestamps = true;

    protected $casts = [
        'request' => 'array'
    ];
}
