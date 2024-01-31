<?php

namespace App\Http\Controllers;



class EvaluacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
      
       

        return view ('evaluacion');
        
    }
   
}