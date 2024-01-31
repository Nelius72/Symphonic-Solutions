<?php

namespace App\Http\Controllers;
use App\Models\Tipoevento;
use App\Models\Evento;


class PresupuestoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
      
        $datos_eventos = Evento::all();
        $tip_eventos = Tipoevento::all();
        return view('presupuesto', compact('tip_eventos','datos_eventos'));

        
        
    }
   
}