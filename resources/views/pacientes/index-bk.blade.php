@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	<h1 class="float-left">Listado de Pacientes</h1>
	<a class="float-right btn btn-xs btn-success" href="/pacientes/create">+ Nuevo Paciente</a>
	
	<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Email</th>
				<th>Teléfono</th>
				<th>Sede</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
		
			@foreach($habilitados as $paciente)
						
					<tr>
						<td><a href="{{ route('paciente.show', $paciente->id) }}">{{$paciente->nombre}}</a></td>
						<td>{{$paciente->email}}</td>
						<td>{{$paciente->telefono}}</td>
						<td>
							@foreach($paciente->sedes as $sede)
								{{ $sede->nombre }}
							@endforeach
						</td>
						<td>
							<a class="btn btn-xs btn-info" href="{{ route('pacientes.edit', $paciente->id) }}">
											Editar
							</a>

							<form style="display: inline;" method="POST" action="{{ route('pacientes.destroy', $paciente->id) }}">
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
										
							<button class="btn btn-xs btn-danger" type="submit">Eliminar</button>

							</form>
						</td>
					</tr>
				
			@endforeach

		</tbody>
	</table>
</div>
@stop