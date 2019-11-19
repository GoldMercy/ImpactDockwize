<?php

namespace App;

use App\Business;
use App\OpenQ;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'Titel', 'Beschrijving'
    ];

    public function question() {
        return $this -> belongsToMany(OpenQ::class);
    }

    public function business() {
        return $this -> belongsToMany(Business::class);
    }

    // Table Name
    protected $table = 'surveys';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}