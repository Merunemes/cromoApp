<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'name', 'email', 'password', 'points', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;

    public function cromos()
    {
        return $this->belongsToMany(Cromo::class, 'usuarios_cromos', 'idUser', 'idCromo');
    }
    
    
}
