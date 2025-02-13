@extends('layouts.app')

@section('template_title')
    Empleados
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                <i class="fa-solid fa-user-plus"></i>    
                                  {{ __('Crear') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >
                                    <i class="fa-solid fa-user"></i> Nombre
                                    </th>
									<th >
                                    <i class="fa-regular fa-at"></i> Email
                                    </th>
									<th >
                                    <i class="fa-solid fa-venus-mars"></i> Sexo
                                    </th>
									<th >Area</th>
                                    <th >
                                    <i class="fa-sharp fa-solid fa-briefcase"></i> Boletin
                                    </th>
                                    <th>
                                        Modificar
                                    </th>
                                    <th>
                                        Eliminar
                                    </th>       

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $empleado->nombre }}</td>
										<td >{{ $empleado->email }}</td>
										<td >{{ $empleado->sexo }}</td>
										<td >{{ $empleado->boletin == 1 ? 'Si' : 'No' }}</td>
										<td >{{ $empleado->area->nombre }}</td>
                                        <td> 
                                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                            <a class="btn btn-sm " href="{{ route('empleados.edit', $empleado->id) }}"><i class="fa-regular fa-pen-to-square"></i> {{ __('') }}</a>    
                                        </td>
                                            <td>
                                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn  btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');"><i class="fa-solid fa-trash-can"></i> {{ __('') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empleados->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
