<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;

    protected $table = 'cuestionarios';

    protected $fillable = [
        'title', 'description',
    ];

    public function cromos()
    {
        return $this->hasMany(Cromo::class); 
    }


    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
}

