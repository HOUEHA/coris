<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Clients extends Model
{
    use HasFactory, HasApiTokens;
    protected $table= "clients";

    protected $fillable= [
        'nom_client',
        'prenom_client',
        'adresse',
        'email',
        'password',
        'adresse',
        'phone'
    ];
}
