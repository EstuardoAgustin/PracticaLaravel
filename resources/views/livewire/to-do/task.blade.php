<div>
    {{-- Stop trying to control. --}}
   {{-- <form action="{{ route('todos') }}" method="POST"> --}}
        <form  wire:submit.prevent="store">
        @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
    
            @endif
            @error('title')
            <h6 class="alert alert-danger">{{$message}}</h6>    
    
            @enderror
          <div class="mb-3">
            <label for="title" class="form-label">Titulo de la Tarea</label>
            <input wire:model="title2" type="text" class="form-control" name="title2" aria-describedby="emailHelp">
            
          </div>
          
          <button type="submit" class="btn btn-primary">Crear Tarea</button>
  
      </form>
      {{-- <form wire:submit.prevent="store">
        <input type="text" wire:model="task.title">
     
      
     
        <button type="submit">Save</button>
    </form> --}}
      
    <div>
        @foreach ($todos as $todo)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                <a href="{{route('todos-show',['id'=> $todo->id])}}">{{ $todo->title}}</a>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{ route('todos-destroy', [$todo->id])}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
            
        @endforeach
      </div>
</div>
