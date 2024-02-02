<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyHistory extends Model
{
    use HasFactory;
    public $table ="study_history";
    protected $fillable =[
        "user_id",
        "school_name",
        "level",
        "location",
        "language",
        "start_date",
        "end_date",
    ];
}