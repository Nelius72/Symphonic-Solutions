<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class AsistenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
      
        $usuarios = Usuario::all();
        return view('asistencia')->with('usuarios', $usuarios);

       
        
    }
   
}