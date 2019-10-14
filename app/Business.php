<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'Ondernemer', 'Onderneming', 'Telefoonnummer', 'Plaats', 'Email',
        'Idee', 'Jaar', 'Doelgroep', 'Thema', 'Programma'
    ];

    protected $primaryKey = 'id';
    protected $table = 'business';
    public $timestamps = false;

}
