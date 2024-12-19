<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kollekcio extends Model
{
    /** @use HasFactory<\Database\Factories\KollekcioFactory> */
    use HasFactory;
    protected $fillable = [
        'nev',
    ];
}
