<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use PhpParser\Node\Stmt\Return_;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //vista de todas las categorias
        $Categorias = Categoria::all();
        return view('categorias.index',['categorias'=>$Categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //para guardar
        $request->validate([
            'name' => 'required|unique:categorias|max:255',
            'color'=> 'required|max:7'
        ]);
 
        $Categorias = new Categoria;
        $Categorias->name= $request-> name;
        $Categorias->color= $request->color;
        $Categorias->save();

        return redirect()->route('categorias.index')->with('success','Nueva Categoria');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $Categorias= Categoria::find($id);
        return view('categorias.show',['categoria'=> $Categorias]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Categorias = Categoria::find($id);
            $Categorias->name = $request->name;
            $Categorias->color = $request->color;

            $Categorias->save();

            //return view('todos.index',['success'=>'Tarea actualizada']);
            return redirect()->route('categorias.index')->with('success', 'Categoria Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Categorias = Categoria::find($id);
            $Categorias->delete();

            return redirect()->route('categorias.index')->with('success', 'Categoria ELIMINADA');
    }
}
