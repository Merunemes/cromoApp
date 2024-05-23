<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = ['pregunta_id', 'questionText', 'isCorrect'];

    public $timestamps = false;

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
