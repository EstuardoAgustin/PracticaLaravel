<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use App\Models\Todo;
use Livewire\Component;

class Main extends Component
{

    public function index(){
        $todos = Todo::all();
        return view('todos.index',['todos'=>$todos]);
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('todos.show',['todo'=>$todo]);
    }
    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        //return view('todos.index',['success'=>'Tarea actualizada']);
        return redirect()->route('todos')->with('success', 'Tarea Actualizada');
    }
    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('success', 'Tarea ELIMINADA');
    }
    

    public function render()
    {
        return view('livewire.main');
    }
    
}
