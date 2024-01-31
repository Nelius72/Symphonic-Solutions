<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Partitura extends Model
{
    
   protected $primaryKey= 'id_partitura';
    protected $table='partitura';
    public $timestamps = false;
    protected $fillable = [
        'titulo_partitura',
        'fecha_creacion',
        'autor',
        'img_partitura',
        'id_tipo_partitura',
        'id_instrumento'
        
    ];

   
}