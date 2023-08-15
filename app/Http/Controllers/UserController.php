<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Client;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserFormRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=User::select('users.*','departments.descripcion as department')
            ->leftjoin('departments','departments.id','users.department_id')
            ->OrderBy('users.name')->get();
        return view('users.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes=Client::where('status','ACTIVO')->OrderBy('nombre')->get();
        $departamentos=Department::all();
        return view('users.create',compact('departamentos','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        $user=new User;
        $user->name=$request->input('nombre');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->department_id=($request->input('tipousuario')=="users")?$request->input('departamento'):0;
        $user->client_id=($request->input('tipousuario')=="clients")?$request->input('cliente'):0;
        $user->tipo=$request->input('tipousuario');
        $user->status='ACTIVO';
        $user->save();
        $user->roles()->sync($request->input('tipousuario'));
        return redirect()->route('users.index')->with('mensaje','Usuario agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
