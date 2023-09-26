<?php

namespace App\Livewire\ToDo;
use App\Models\Todo;
use Livewire\Component;
use Illuminate\Http\Request;

class Task extends Component
{
    public $todos;
    public Todo $task;
    public $title2;

    protected $rules = [
        //'task.title' => 'required|string|min:3',
        'title2' => 'required|string|min:3',

    ];

    public function mount()
    {
        $this->todos = Todo::all();
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
        //$this->title->save();



        //  return redirect()->route('todos')->with('success','Tarea ingresada correctamente');

    }
}
