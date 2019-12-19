<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyStatus extends Model
{
    // Table Name
    protected $table = 'survey_statuses';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
