<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Area;
use App\Models\Rol;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        
        $empleados = Empleado::with('area', 'roles')->paginate();

        return view('empleado.index', compact('empleados'))
            ->with('i', ($request->input('page', 1) - 1) * $empleados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $empleado = new Empleado();
        $areas = Area::all(); // Listado de todas las áreas
        $roles = Rol::all(); // Listado de todos los roles

        return view('empleado.create', compact('empleado', 'areas', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadoRequest $request): RedirectResponse
    {
       
    

        $empleado = Empleado::create($request->validated());

        
        $empleado->area()->associate($request->input('area_id'));


        $empleado->roles()->sync($request->input('roles', [])); 


        $empleado->save();

        return Redirect::route('empleados.index')
            ->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        
        $empleado = Empleado::with('area', 'roles')->findOrFail($id);

        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $empleado = Empleado::findOrFail($id);
        $areas = Area::all(); 
        $roles = Rol::all(); 

        return view('empleado.edit', compact('empleado', 'areas', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadoRequest $request, Empleado $empleado): RedirectResponse
    {


        $empleado->update($request->validated());

        $empleado->area()->associate($request->input('area_id'));

        $empleado->roles()->sync($request->input('roles', []));

        $empleado->save();

        return Redirect::route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $empleado = Empleado::findOrFail($id);


        $empleado->roles()->detach();

        $empleado->delete();

        return Redirect::route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}
