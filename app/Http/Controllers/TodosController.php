<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * index para mostrar todo
     * store para guardar un todo 
     * update para actualizar
     * destroy para eliminar
     * edit para mostrar el formulario de edicion
     */
    //

    public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|min:3' 
            ]);

            $todo = new Todo;
            $todo->title = $request->title;
            $todo->save();

            return redirect()->route('todos')->with('success','Tarea ingresada correctamente'); 

        }

        public function index(){
            $todos = Todo::all();
            return view('todos.index',['todos'=>$todos]);
        }
}
