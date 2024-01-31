<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Evento extends Model
{
    
   protected $primaryKey= 'id_evento';
    protected $table='evento';
    public $timestamps = false;
    protected $fillable = [
        'titulo_evento',
        'descripcion',
        'fecha_evento',
        'hora_inicio',
        'hora_fin',
        'id_usuario',
        'id_tipo_evento'
        
    ];

   
}