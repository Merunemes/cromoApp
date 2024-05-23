<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cromo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuestionario_id', 'name', 'description', 'points', 'image',
    ];

    public function cuestionario()
    {
        return $this->belongsTo(Cuestionario::class);
    }
}
