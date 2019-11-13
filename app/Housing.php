<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Housing extends Model
{
    protected $fillable = ['housing_name'];

    public $timestamps = false;
}
