@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	<h1>Editar Empleado</h1>
	<form 
		method="POST"
		action="{{ route('empleados.update', $empleado->id) }}">
				
				{!! method_field('PUT') !!}
				{!! csrf_field() !!}

				<p>
					<label for="nombre">
					Nombre
					<input class="form-control" type="text" name="nombre" value="{{ $empleado->nombre }}">
					{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
					</label>
				</p>
				<p>
					<label for="telefono">
					Teléfono
					<input class="form-control" type="text" name="telefono" value="{{ $empleado->telefono }}">
					{!! $errors->first('telefono', '<span class=error>:message</span>') !!}
					</label>
				</p>
				<p>
					<label for="email">
					Email
					<input class="form-control" type="email" name="email" value="{{ $empleado->email }}">
					{!! $errors->first('email', '<span class=error>:message</span>') !!}
					</label>
				</p>
				<p>
					<label for="password">
					Contraseña
					<input class="form-control" type="password" name="password" value="" placeholder="Nueva contraseña">
					{!! $errors->first('password', '<span class=error>:message</span>') !!}
					</label>
				</p>
				
				<div class="ml-1">
					<h4>Sedes disponibles:</h4>
						
						@foreach($sedes as $id => $nombre)
							<label>	

								<input class="form-check form-check-inline" 
								type="checkbox" 
								value="{{ $id }}"

								@if(in_array($id, $empleado->sedes->pluck('id')->toArray()))

									checked

						    	@endif

						    	name="sedes[]">

						    	


						    	
						    	{{ $nombre }}
						  		
						  	</label>
						@endforeach
				</div>
				


			
					{!! $errors->first('sede', '<span class=error>:message</span>') !!}
				
		<p><input class="btn btn-primary" type="submit" value="Enviar"></p>

	</form>
</div>
@stop