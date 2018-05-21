
@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	@if(session()->has('info'))
		<div class="alert alert-success">{{session('info')}}</div>
	@endif
	<h1 class="float-left">Listado de Empleados</h1>
	<a class="float-right btn btn-xs btn-success" href="/empleados/create">+ Nuevo Empleado</a>
		
			<table id="empleados" class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Email</th>
						<th>Teléfono</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($empleados as $empleado)
						<tr>
							<td>{{$empleado->nombre}}</td>
							<td>{{$empleado->email}}</td>
							<td>{{$empleado->telefono}}</td>
							<td><a class="btn btn-sm btn-warning" href="/empleados/{{$empleado->id}}/edit">E</a> <form style="display: inline;" method="POST" action="{{ route('empleados.destroy', $empleado->id) }}">
										{!! csrf_field() !!}
										{!! method_field('DELETE') !!}
											<button class="btn btn-sm btn-danger" type="submit">X</button>
										</form></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		
</div>
@stop