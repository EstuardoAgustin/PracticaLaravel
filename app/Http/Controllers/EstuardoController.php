<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estuardo;

class EstuardoController extends Controller
{
    //
    public function store(Request $request)
        {
            

            $estuardo = new Estuardo;
            $estuardo->EstuardoDato = $request->EstuardoDato;
            $estuardo->save();

            return redirect()->route('todos')->with('success','Tarea ingresada correctamente'); 
        }
}
