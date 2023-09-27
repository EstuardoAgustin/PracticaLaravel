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

   protected $listeners = ['taskSaved'];
   public function taskSaved($message)
   {
    session()->flash('success',$message);
   }

    public function render()
    {
        return view('livewire.main');
    }

}
