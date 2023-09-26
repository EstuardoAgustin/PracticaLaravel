<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabla;
use App\Models\Todo;

class TablaController extends Controller
{
    //
    public function store(Request $request)
{
    $this->validate($request, [
        'datotabla' => 'required|string',
    ]);

    $tabla = new Tabla;
    $tabla->datotabla = $request->datotabla;
    $tabla->save();

    return redirect()->route('todos')->with('success','Tarea ingresada correctamente');
}

public function index(){
    $todos = Todo::all();
    return view('todos.index',['todos'=>$todos]);
}

}
