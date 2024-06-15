<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    //On aurait pu enlever les timestamps pour ce petit projet mais je laisse
    //il aurait fallut mettre dans le model(ce fichier) $timestamps = false;

    protected $fillable = [
        'titre',
        'description',
        'categorie',
        'image_url'
    ];
}
