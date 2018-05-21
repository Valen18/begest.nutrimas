@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	<h1>Nuevo Empleado</h1>
	<form 
		method="POST"
		action="{{ route('empleados.store') }}">
				
				{!! csrf_field() !!}
				<input name="role_id" type="hidden" value="2">
				<p>
					<label for="nombre">
					Nombre
					<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
					{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
					</label>
				</p>
				<p>
					<label for="email">
					Email
					<input class="form-control" type="email" name="email" value="{{ old('email') }}">
					{!! $errors->first('email', '<span class=error>:message</span>') !!}
					</label>
				</p>
				<p>
					<label for="telefono">
					Teléfono
					<input class="form-control" type="text" name="telefono" value="{{ old('telefono') }}">
					{!! $errors->first('telefono', '<span class=error>:message</span>') !!}
					</label>
				</p>
				<p>
					<label for="password">
					Contraseña
					<input class="form-control" type="password" name="password" value="">
					{!! $errors->first('password', '<span class=error>:message</span>') !!}
					</label>
				</p>

				<div class="ml-1">
					<h4>Sedes disponibles:</h4>
						
						@foreach($sedes as $id => $nombre)
							<label>	
						    	<input class="form-check form-check-inline" type="checkbox" value="{{ $id }}" name="sedes[]">
						    	{{ $nombre }}
						  		
						  	</label>
						@endforeach
				</div>
		<p><input class="btn btn-primary" type="submit" value="Enviar"></p>

	</form>
</div>
@stop