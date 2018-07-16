@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	@if(session()->has('info'))
		<div class="alert alert-success">{{session('info')}}</div>
	@endif
	<h1 class="float-left">Listado de Sedes</h1>
	<a class="float-right btn btn-xs btn-success" href="/sedes/create">+ Nueva Sede</a>
		
			<table id="empleados" class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sedes as $sede)
						<tr>
							<td>{{$sede->nombre}}</td>
							<td><a class="btn btn-sm btn-warning" href="/sedes/{{$sede->id}}/edit">E</a> <form style="display: inline;" method="POST" action="{{ route('sedes.destroy', $sede->id) }}">
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