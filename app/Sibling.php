<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sibling extends Model
{
    use HasFactory;
    public $table ="siblings";
    protected $fillable = [
        "user_id",
        "family_name",
        "first_name",
        "birth_date",
        "level",
        "school",
    ];
}