<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Reclamations extends Model
{

    use HasFactory, HasApiTokens;
    protected $table= "reclamations";

    protected $fillable= [
        'client_id',
        'objet',
        'description',
    ];
}
