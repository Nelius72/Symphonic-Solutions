<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tipoevento extends Model
{
    
    protected $primaryKey='id_tipo_evento';
    protected $table='tipo_evento';
    public $timestamps = false;
    protected $fillable = [
        'tipologia'
        
    ];

   
}
