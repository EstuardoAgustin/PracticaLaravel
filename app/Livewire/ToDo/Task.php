<?php

namespace App\Livewire\ToDo;

use App\Models\Todo;
use Livewire\Component;
use Illuminate\Http\Request;
use function Livewire\Volt\{rules};

class Task extends Component
{
    public $todos;
    public Todo $task;
    public $title2;
    public $mostrarBoton = false;
    protected $rules = [
        //'task.title' => 'required|string|min:3',
        'title2' => 'required|string|min:3',

    ];

    public function validar(){
        $this->validate(['title2' => 'required|string|min:3']);
    }

    public function mount()
    {
        $this->todos = Todo::orderByDesc('id')->get();
        //$this->task = new Todo();
    }

    public function render()
    {
        return view('livewire.to-do.task');
    }

    public function store(Request $request)
    {


        // $request->validate([
        //     'title' => 'required|min:3'
        // ]);
        //dd($request);
        // $todo = new Todo;
        // // $todo->title = $this->task->title; // Changed this line
        // $todo->title = $request->title;
        $this->validate();
        $todo = new Todo;
        $todo->title = $this->title2;
        $todo->save();
        $this->mount();//recarga el formulario inicial
        $this->dispatch('taskSaved','tarea Guardada')->to('main');


      // $this->Event::makeListener('taskSaved');

    }
    public function update($id){
        // $todo = Todo::find($id);
        // $todo->title = $request->title;
        // $todo->save();

        // //return view('todos.index',['success'=>'Tarea actualizada']);
        // return redirect()->route('todos')->with('success', 'Tarea Actualizada');
        $todo = Todo::find($id);
        $this->title2=$todo->title;
        $this->mostrarBoton = true;

    }

    public function edit($id){
        $todo = Todo::find($id);
        $todo->title = $this->title2;
        $todo->save();
        $this->mount();//recarga el formulario inicial
        $this->dispatch('taskSaved','tarea ACTUALIZADA')->to('main');
        //return view('todos.index',['success'=>'Tarea actualizada']);
        // return redirect()->route('todos')->with('success', 'Tarea Actualizada');



    }
    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        $this->mount();//recarga el formulario inicial
        $this->dispatch('taskSaved','tarea ELIMINADA')->to('main');
    }
}
