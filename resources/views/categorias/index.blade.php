@extends('app')
@section('content')

    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{session('success')}}</h6>
          
                @endif
                @error('name')
                <h6 class="alert alert-danger">{{$message}}</h6>    
          
                @enderror
                  <div class="mb-3">
                    <label for="name" class="form-label">Titulo de la categoria</label>
                    <input type="text" class="form-control" name="name" >
                  </div>
                  <div class="mb-3">
                    <label for="color" class="form-label">Color de la categoria</label>
                    <input type="color" class="form-control" name="color" >
                  </div>

                  <button type="submit" class="btn btn-primary">Crear Tarea</button>
          
              </form>
              <div>
                @foreach ($categorias as $categoria)
                   
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{route('categorias.show',['categoria'=> $categoria->id])}}">  {{ $categoria->name}} </a>
                            <span class="color-container" style="background-color: {{$categoria->color}}"></span>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                          
                             
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar-{{$categoria->id}}">
                                Editar
                            </button>
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$categoria->id}}">
                                Eliminar
                            </button>
                        </div>
                    </div>

                   
  
                <!-- Modal ELIMINAR-->
                    <div class="modal fade" id="{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            Esta seguro que desea Eliminar esta categoria: 
                            {{$categoria->name}}
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                               
                                <form action="{{ route('categorias.destroy', [$categoria->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                </form>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                <!-- Fin Modal -->

                <!-- Modal EDITAR-->
                <div class="modal fade" id="editar-{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Categoria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Desea Editar esta categoria: 
                        {{$categoria->name}}
                        </div>
                        <form action="{{ route('categorias.update' , ['categoria'=> $categoria -> id])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            @if (session('success'))
                                <h6 class="alert alert-success">{{session('success')}}</h6>

                            @endif
                            @error('title')
                            <h6 class="alert alert-danger">{{$message}}</h6>    

                            @enderror

                            <div class="mb-3">
                                <label for="name" class="form-label">Titulo de la categoria</label>
                                <input type="text" class="form-control" name="name" value="{{$categoria->name}}" >
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Color de la categoria</label>
                                <input type="color" class="form-control" name="color" value="{{$categoria->color}}">
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        
                        </div>
                    </div>
                    </div>
                </div>
            <!-- Fin Modal -->
                @endforeach
              </div>
        </div>
    </div>

@endsection