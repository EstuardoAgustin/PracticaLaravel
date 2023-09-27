<div>
    {{-- Stop trying to control. --}}
    {{-- <form action="{{ route('todos') }}" method="POST"> --}}
        {{-- ANDRE ESTE PRUEBA --}}
    <form wire:submit.prevent="store">
        @csrf

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
                    <a wire:click.prevent='update({{ $todo->id }})' href="">{{ $todo->title }}</a>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <form wire:submit.prevent="destroy({{ $todo->id }})" method="POST">

                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    @if ($mostrarBoton)
                    <button wire:click.prevent='edit({{ $todo->id }})' type="submit" class="btn btn-primary">Actualizar</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
