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
        $sorteos = Sorteo::all();
        return view('index', compact('sorteos'));
            
    }

    

    
    public function store(Request $request)
    {
        //Funcion para almacenar un nuevo sorteo
        $sorteo = new Sorteo();
        $sorteo->sorteo_nombre = $request->sorteo_nombre;
        $sorteo->sorteo_descripcion = $request->sorteo_descripcion;
        $sorteo->precio_boleto = $request->precio_boleto;
        if ($request->hasFile('sorteo_imagen')) {
            $image = $request->file('sorteo_imagen');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('sorteo', $filename, 'public'); // Guarda con el nombre original
            $sorteo->sorteo_imagen = 'sorteo/' . $filename; // Guarda la ruta con el nombre original
        }

        
        $sorteo->sorteo_fecha_inicio = $request->sorteo_fecha_inicio;
        $sorteo->sorteo_fecha_fin= $request->sorteo_fecha_fin;
        $sorteo->created_at = now();
        $sorteo->updated_at = now();
        $sorteo->save();
        return redirect()->route('sorteo.index');
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
        //Funcion para eliminar un sorteo
        $sorteo->delete();
        return redirect()->route('pago.index');
    }
}
