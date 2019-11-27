<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DropdownQOptions extends Model
{
    // Table Name
    protected $table = 'dropdownqs_options';
    // Primary Key
    public $primaryKey = 'dropdownoption_id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'dropdownoption_name', 'dropdown_id'
    ];
}
