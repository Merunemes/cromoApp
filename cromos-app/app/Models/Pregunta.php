<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas'; 
    protected $fillable = ['cuestionario_id', 'enunciado'];
    public $timestamps = false;

    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class);
    }


    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'idPregunta');
    }
}

