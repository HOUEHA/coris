<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Reponses extends Model
{
    use HasFactory, HasApiTokens;
    protected $table= "reponses";

    protected $fillable= [
        'reclamation_id',
        'message',
    ];

}
