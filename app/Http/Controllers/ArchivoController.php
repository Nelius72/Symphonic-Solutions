<?php

namespace App\Http\Controllers;

use App\Models\Partitura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
{

    public function __construct() //Si el usuario no está autenticado será redirigido al login automaticamente.
    {
        $this->middleware('auth');
    }
    public function show(){
      
        $partituras = Partitura::all();
        return view('archivo', compact('partituras'));

        // return view ('archivo');
        
    }
    
}