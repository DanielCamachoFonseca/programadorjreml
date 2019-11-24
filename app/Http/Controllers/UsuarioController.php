<?php

namespace eml\Http\Controllers;


use Illuminate\Http\Request;
use app;
use DispatchesJobs, ValidatesRequests;
use eml; 
use eml\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = eml\Usuario::paginate(5);
        return view('inicio', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cedula' => 'required|numeric',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|',
        ]);

        $usuarioAgregar = new Usuario;
        $usuarioAgregar->nombre = $request->nombre;
        $usuarioAgregar->apellido = $request->apellido;
        $usuarioAgregar->cedula = $request->cedula;
        $usuarioAgregar->correo = $request->correo;
        $usuarioAgregar->telefono = $request->telefono;
        $usuarioAgregar->save();
        return back()->with('agregar','Usuario agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \eml\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \eml\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioActualizar = eml\Usuario::findOrFail($id);
        return view('editar', compact('usuarioActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \eml\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuarioUpdate = eml\Usuario::findOrFail($id);
        $usuarioUpdate->nombre = $request->nombre;
        $usuarioUpdate->apellido = $request->apellido;
        $usuarioUpdate->cedula = $request->cedula;
        $usuarioUpdate->correo = $request->correo;
        $usuarioUpdate->telefono = $request->telefono;
        $usuarioUpdate->save();
        return back()->with('update', 'El usuario ha sido actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \eml\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarioEliminar = eml\Usuario::findOrFail($id);
        $usuarioEliminar->delete();
        return back()->with('eliminar', 'El usuario ha sido eliminado correctamente.');
    }
}
