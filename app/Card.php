<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    // Table Name
    protected $table = 'cards';
    // Primary Key
    public $primaryKey = 'card_id';
    // Timestamps
    public $timestamps = true;
}