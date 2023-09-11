@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-4 ">
    <form action="{{route('todos')}}" method="POST">
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titulo de la Tarea</label>
          <input type="text" class="form-control" name="title" aria-describedby="emailHelp">
          
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Tarea</button>

    </form>
</div>
    
@endsection