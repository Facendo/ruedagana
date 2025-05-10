<?php

namespace App\Http\Controllers;

use App\Models\Sorteo;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SorteoController extends Controller
{
    
    public function index()
    {
        //retorna la vista principal de sorteo
    }

    
    public function create()
    {
        //retorna la vista para crear un nuevo sorteo
        return view('sorteo.create');
        
    }

    
    public function store(Request $request)
    {
        //Funcion para almacenar un nuevo sorteo
        $sorteo = new Sorteo();
        $sorteo->sorteo_nombre = $request->sorteo_nombre;
        $sorteo->sorteo_descripcion = $request->sorteo_descripcion;
        if ($request->hasFile('sorteo_imagen')) {
            Storage::put('sorteo', $request->file('sorteo_imagen'));
            $img = $request->file('sorteo_imagen');
            $sorteo->sorteo_imagen = 'img/sorteo/' . $img->getClientOriginalName();
        }
        $sorteo->sorteo_fecha_inicio = $request->sorteo_fecha_inicio;
        $sorteo->sorteo_fecha_fin= $request->sorteo_fecha_fin;
        $sorteo->created_at = now();
        $sorteo->updated_at = now();
        $sorteo->save();
        return redirect()->route('pago.index')->with('success', 'Sorteo creado exitosamente');
    }


   
    public function edit(Sorteo $sorteo)
    {
        //retorna la vista para editar un sorteo
        return view('sorteo.edit', compact('sorteo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sorteo $sorteo)
    {
        //Funcion para actualizar un sorteo
        $sorteo->sorteo_nombre = $request->sorteo_nombre;
        $sorteo->sorteo_fecha_inicio = $request->sorteo_fecha_inicio;
        $sorteo->sorteo_fecha_fin= $request->sorteo_fecha_fin;
        
        $sorteo->updated_at = $request->now();
        $sorteo->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sorteo $sorteo)
    {
        //funcikon para eliminar un sorteo
    }
}
