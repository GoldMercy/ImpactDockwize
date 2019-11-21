<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Survey;
use App\SurveyStatus;

class Business extends Model
{
    protected $fillable = [
        'Ondernemer', 'Onderneming', 'Telefoonnummer', 'Plaats', 'Email',
        'Idee', 'Jaar', 'Doelgroep', 'Thema', 'Programma', 'Huisvesting', 'created_at'
    ];

    protected $primaryKey = 'id';
    protected $table = 'business';
    public $timestamps = false;

    public function surveyb() {
        return $this -> belongsToMany(Survey::class);
    }
    
    public function surstat() {
        return $this -> belongsToMany(SurveyStatus::class);
    }

}
