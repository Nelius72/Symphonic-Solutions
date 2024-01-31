<?php

namespace App\Http\Controllers;

use App\Models\Partitura;
use Illuminate\Http\Request;

class PartituraController extends Controller
{

    
    public function insertar()
    {
        $datos_partitura = request()->validate(
            [
                'titulo_partitura' => 'required',
                'autor' => 'required',
                'fecha_creacion' => 'required',
                'id_tipo_partitura' => 'required',
                'id_instrumento' => 'required',
                'img_partitura' => 'required',

            ]
        );

        //    dd($datos_partitura);
        Partitura::create($datos_partitura);
        return redirect('/archivo')->with('success', 'Partitura Añadida Correctamente');
    }

    public function modificar(Request $request)
    {
        $id = $request->input('id_partitura');
        // dd($id);
        $seleccionada = Partitura::where('id_partitura',$id)->firstorFail();

        $seleccionada->titulo_partitura = $request->input('titulo_partitura');
        $seleccionada->fecha_creacion = $request->input('fecha_creacion');
        $seleccionada->autor = $request->input('autor');
        $seleccionada->img_partitura = $request->input('img_partitura');
        $seleccionada->id_tipo_partitura = $request->input('id_tipo_partitura');
        $seleccionada->id_instrumento = $request->input('id_instrumento');
// dd($seleccionada);
        $seleccionada->save();

        return redirect('/archivo')->with('success', 'Partitura Modificada Correctamente');
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id_partitura');
        // dd($id);
        $partitura = Partitura::where('id_partitura',$id)->firstorFail();
        
        if (!$partitura) {
            return redirect('/archivo')->with('error', 'Partitura no encontrada');
        }

        $partitura->delete();

        return redirect('/archivo')->with('success', 'Partitura eliminada correctamente');
    }

    public function buscar(Request $request) //////////////////////////////////////
{
    $searchQuery = $request->input('search');

    $partituras = Partitura::where('titulo_partitura', 'like', '%'.$searchQuery.'%')
                            ->orWhere('autor', 'like', '%'.$searchQuery.'%')
                            ->get();

    return view('/archivo', compact('partituras'));
}

}
