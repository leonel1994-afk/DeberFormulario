<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;
use App;
use TaskCrud\Http\Requests\UserRequest;


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = App\Nota::paginate(5);
        return view('inicio' , compact('notas'));
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
        $notaAgregar = new Nota;
        $request->validate([
            'nombre' => 'required|alpha|max:30',
            'apellido' => 'required|alpha|max:30',
            'edad' => 'required|numeric|digits:2',
            'correo' => 'required',
            'contrasenia' => 'required|min:6|regex:([a-zA-Z0-9\s]+)',

        ],
        [
            'nombre.alpha' => 'En el Nombre ingrese Solo letras',
            'nombre.max' => 'En el Nombre Maximo 30 caracteres',
            'apellido.alpha' => 'En el Apellido ingrese Solo letras',
            'apellido.max' => 'En el Apellido Maximo 30 caracteres',
            'edad.numeric' => 'En la Edad Ingrese solo Numeros',
            'edad.digits' => 'En la Edad Ingrese max 2 caracteres',
            'correo.email' => 'Ingrese un correo valido',
            'contrasenia.min' => 'En la contraseña ingrese minimo 6 caracteres',
            'contrasenia.regex' => 'En la contraseña ingrese Solo letras y numeros',
        ]);

        $notaAgregar->nombre = $request->nombre;
        $notaAgregar->apellido = $request->apellido;
        $notaAgregar->edad = $request->edad;
        $notaAgregar->correo = $request->correo;
        $notaAgregar->contrasenia = $request->contrasenia;
        $notaAgregar->save();
        return back()->with('agregar' , 'La nota se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaActualizar = App\Nota::findOrFail($id);
        return view('editar' , compact('notaActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|alpha|max:30',
            'apellido' => 'required|alpha|max:30',
            'edad' => 'required|numeric|digits:2',
            'correo' => 'required',
            'contrasenia' => 'required|min:6|regex:([a-zA-Z0-9\s]+)',

        ],
        [
            'nombre.alpha' => 'En el Nombre ingrese Solo letras',
            'nombre.max' => 'En el Nombre Maximo 30 caracteres',
            'apellido.alpha' => 'En el Apellido ingrese Solo letras',
            'apellido.max' => 'En el Apellido Maximo 30 caracteres',
            'edad.numeric' => 'En la Edad Ingrese solo Numeros',
            'edad.digits' => 'En la Edad Ingrese max 2 caracteres',
            'correo.email' => 'Ingrese un correo valido',
            'contrasenia.min' => 'En la contraseña ingrese minimo 6 caracteres',
            'contrasenia.regex' => 'En la contraseña ingrese Solo letras y numeros',
        ]);

        $notaUpdate = App\Nota::findOrFail($id);
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->apellido = $request->apellido;
        $notaUpdate->edad = $request->edad;
        $notaUpdate->correo = $request->correo;
        $notaUpdate->contrasenia = $request->contrasenia;
        $notaUpdate->save();
        return back()->with('update' , 'La nota ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notaEliminar = App\Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('eliminar' , 'La nota ha sido eliminada correctamente');
    }
}
