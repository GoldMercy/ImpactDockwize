<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OldBusinessData extends Model
{
    protected $fillable = [
        'business_id', 'Ondernemer', 'Onderneming', 'Telefoonnummer', 'Plaats', 'Email',
        'Idee', 'Jaar', 'Doelgroep', 'Thema', 'Programma', 'Huisvesting', 'created_at'
    ];

    protected $primaryKey = 'id';
    protected $table = 'old_business_data';
    public $timestamps = false;
}
