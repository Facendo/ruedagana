<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Vista para listar los administradores
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Vista para crear un nuevo administrador
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin= new Admin();
        $admin->user=$request->user;
        $admin->password=$request->password;
        $admin->id_sorteo=$request->id_sorteo;
        $admin->created_at=now();
        $admin->updated_at=now();
        $admin->save();
        return redirect()->route('admin.index')->with('success', 'Administrador creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admind)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admind)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admind)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admind)
    {
        //
    }
}
