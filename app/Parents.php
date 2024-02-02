<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    public $table ="parents";
    protected $fillable = [
        'user_id',
        'type',
        'name',
        'nationality',
        'work_address',
        'phone_number',
        'email_address',
        ];

}