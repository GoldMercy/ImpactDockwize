<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['keys', 'values'];

    protected $primaryKey = 'id';
    protected $table = 'answers';
    public $timestamps = true;
}
