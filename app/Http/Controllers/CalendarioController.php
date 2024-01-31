<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Tipoevento;
use App\Models\Evento;

class CalendarioController extends Controller
{

    public function obtenerEventos() //////////////////////////FUNCIÓN PARA MOSTRAR LOS EVENTOS EN EL CALENDARIO///////////////////////
    {
        $eventos = Evento::all();

        $eventosData = [];

        foreach ($eventos as $evento) {
            $eventoData = [
                'title' => $evento->titulo_evento,
                'start' => $evento->fecha_evento . ' ' . $evento->hora_inicio,
                'end' => $evento->fecha_evento . ' ' . $evento->hora_fin,
                'description' => $evento->descripcion,
                'id_evento' => $evento->id_evento,
                // Otros campos del evento que desees mostrar en el calendario
            ];

            $eventosData[] = $eventoData;
        }

        return response()->json($eventosData);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $datos_eventos = Evento::all();
        $tip_eventos = Tipoevento::all();
        return view('calendario', compact('tip_eventos','datos_eventos'));
    }
}
