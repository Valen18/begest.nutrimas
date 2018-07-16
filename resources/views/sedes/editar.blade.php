@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	<h1>Editar Sede</h1>
	<form 
		method="POST"
		action="{{ route('sedes.update', $sede->id) }}">
				
				{!! method_field('PUT') !!}
				{!! csrf_field() !!}

				<p>
					<label for="nombre">
					Nombre
					<input class="form-control" type="text" name="nombre" value="{{ $sede->nombre }}">
					{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
					</label>
				</p>			
				
		<p><input class="btn btn-primary" type="submit" value="Enviar"></p>

	</form>
</div>
@stop