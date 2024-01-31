<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    // use Model;//////////////////
    protected $primaryKey='id_usuario';////////////////////////////////
    protected $table='usuario';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'apellidos',
        'sexo',
        'username',
        'password',
        'email',
        'es_director'
    ];

   
}
