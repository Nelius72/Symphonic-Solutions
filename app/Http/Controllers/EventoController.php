<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class EventoController extends Controller
{

    public function insertar(Request $request)
    {
        // Validar los datos del formulario
        $datos_evento = $request->validate([
            'titulo_evento' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'id_tipo_evento' => 'required',
        ]);

        // Obtener la fecha y hora del evento
        $fechaEvento = $datos_evento['fecha_evento'];
        $horaInicio = $datos_evento['hora_inicio'];
        $horaFin = $datos_evento['hora_fin'];
        $fechaInicio = $fechaEvento . ' ' . $horaInicio;
        $fechaFin = $fechaEvento . ' ' . $horaFin;

        // Crear el evento en la base de datos
        $evento = new Evento();
        $evento->titulo_evento = $datos_evento['titulo_evento'];
        $evento->descripcion = $datos_evento['descripcion'];
        $evento->fecha_evento = $fechaEvento;
        $evento->hora_inicio = $horaInicio;
        $evento->hora_fin = $horaFin;
        $evento->id_usuario = Auth::id(); // ID del usuario autenticado
        $evento->id_tipo_evento = $datos_evento['id_tipo_evento'];
        $evento->save();

        $musico = '0';
        // Obtener los usuarios de tipo "músico"
        $usuariosMusicos = Usuario::where('es_director', $musico)->get();
        // dd($usuariosMusicos);

        // Enviar un correo electrónico a cada usuario
        foreach ($usuariosMusicos as $usuario) {
            $tituloEvento = $datos_evento['titulo_evento'];
            $descripcion = $datos_evento['descripcion'];
            $fechaEvento = $datos_evento['fecha_evento'];
            $horaInicio = $datos_evento['hora_inicio'];
            $horaFin = $datos_evento['hora_fin'];

            Mail::raw('NUEVO EVENTO AÑADIDO' . "\n" . "\n" .
                'Título del evento: ' .$tituloEvento. "\n" .
                'Descripción: ' . $descripcion . "\n" .
                'Fecha del evento: ' . $fechaEvento . "\n" .
                'Hora de Inicio: ' . $horaInicio . "\n" .
                'Hora de Fin: ' . $horaFin . "\n", function ($message) use ($usuario, $tituloEvento) {
                $message->to($usuario->email);
                $message->subject('Nuevo evento "'. $tituloEvento.'" añadido al calendario en Symphonic Solutions');
            });
        }

        return redirect('/calendario')->with('success', 'Evento creado correctamente');
    }

    public function eliminar(Request $request)
    {

        // Obtener el ID del evento a eliminar
        $idEvento = $request->input('id_evento');
        // dd($idEvento);
        // Buscar el evento en la base de datos
        $evento = Evento::find($idEvento);

        if ($evento) {
            // Verificar si el evento pertenece al usuario autenticado
            if ($evento->id_usuario == Auth::id()) {
                // Guardar el título del evento antes de eliminarlo
                $tituloEvento = $evento->titulo_evento;
                // Eliminar el evento
                $evento->delete();


                $musico = '0';
                // Obtener los usuarios de tipo "músico"
                $usuariosMusicos = Usuario::where('es_director', $musico)->get();
                // dd($usuariosMusicos);

                // Enviar un correo electrónico a cada usuario
                foreach ($usuariosMusicos as $usuario) {
                    Mail::raw(
                        'El evento "'.$tituloEvento.'" ha sido eliminado por el Director' . "\n",
                        function ($message) use ($usuario, $tituloEvento) {
                            $message->to($usuario->email);
                            $message->subject('Evento "'.$tituloEvento.'" eliminado en Calendario de Symphonic Solutions');
                        }
                    );
                }
                return redirect('/calendario')->with('success', 'Evento eliminado correctamente');
            } else {
                return redirect('/calendario')->with('error', 'No tienes permiso para eliminar este evento');
            }
        } else {
            return redirect('/calendario')->with('error', 'El evento no existe');
        }
    }
}
