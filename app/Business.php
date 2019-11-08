<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'Ondernemer', 'Onderneming', 'Telefoonnummer', 'Plaats', 'Email',
        'Idee', 'Jaar', 'Doelgroep', 'Thema', 'Programma', 'Huisvesting', 'created_at'
    ];

    protected $primaryKey = 'id';
    protected $table = 'business';
    public $timestamps = false;

}
