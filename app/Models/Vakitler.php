<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vakitler extends Model
{
    use HasFactory;
    protected $fillable = ['id','imsak','gunes','ogle','ikindi','aksam','yatsi','date'];
}
