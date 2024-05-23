<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UsuarioCromo extends Model
{
    use HasFactory;

    protected $table = 'usuarios_cromos';

    protected $fillable = ['usuario_id', 'cromo_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function cromo()
    {
        return $this->belongsTo(Cromo::class);
    }
}
