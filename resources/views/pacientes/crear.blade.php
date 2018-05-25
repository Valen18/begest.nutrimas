@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	<h1>Crear Paciente</h1>
	<div class="row">
		
		<div class="col-6">
			<h3>Datos de Contacto</h3>
			<form 
				method="POST"
				action="{{ route('pacientes.store') }}">
						
						
						{!! csrf_field() !!}
						<input name="role_id" type="hidden" value="3">
<<<<<<< HEAD
						<input name="empleado_id" type="hidden" value="{{auth()->user()->id}}">
=======
>>>>>>> parent of 5823f0a... act
						<input name="password" type="hidden" value="nutrimas">
						<label>Sede: </label>
						<p>
							@foreach($sedes as $id => $nombre)
							
								<input class="form-check form-check-inline" 
								type="radio" 
								value="{{ $id }}"
							 	name="sedes[]">
						    	{{ $nombre }}

								<span class="mr-4"></span>
						    @endforeach
						  	{!! $errors->first('sedes', '<span class=error>:message</span>') !!}	
						</p> 	
						
						<p>
							<label for="nombre">
							Nombre
							</label>
							<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
							{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
							
						</p>
						<p>
							<label for="email">
							Email
							</label>
							<input class="form-control" type="email" name="email" value="{{ old('email') }}">
							{!! $errors->first('email', '<span class=error>:message</span>') !!}
							
							
						</p>
						<p>
							<label for="telefono">
							Teléfono
							</label>
							<input class="form-control" type="text" name="telefono" value="{{ old('telefono') }}">
							{!! $errors->first('telefono', '<span class=error>:message</span>') !!}
							
						</p>
						
		</div>
	

		
	<div class="col-6">
		<h3>Datos Personales</h3>
			<div class="row">
				<div class="col-6">
					<label for="fecha_nac">
					Fecha de Nacimiento
					</label>
		    			<input type="date" class="form-control" name="fecha_nac" placeholder="" value="{{ old('fecha_nac') }}">
		    		
		 		</div>
		 		<div class="col-4">
		 			<label for="sexo">
					Sexo
					</label>
		    			<select class="form-control" name="sexo">
						  <option value="">Seleccionar</option>
						  <option value="hombre">Hombre</option>
						  <option value="mujer">Mujer</option>
						</select>
		    		
		 		</div>
		 		<div class="col-2">
					<label for="Altura">
					Altura
					</label>
		    			<input type="text" class="form-control" name="altura" placeholder="cms" value="{{ old('altura') }}">
		    		
		 		</div>
		 		
			</div> <!-- FIN ROW -->

			<div class="row my-3 p-1">
				<div class="col-4">
		 			<label for="act_lab">
					Actividad Laboral
					</label>
				   		
				   		<select class="form-control" name="act_lab">
						  <option value="">Seleccionar</option>
						  <option value="desempleado">Desempleado</option>
						  <option value="sedentaria">Sedentaria</option>
						  <option value="50% activa">50% Activa</option>
						  <option value="muy activa">Muy Activa</option>
						</select>

		 		</div>

		 		<div class="col-4">
		 			<label for="act_dep">
					Actividad Deportiva
					</label>
		    			
		    			<select class="form-control" name="act_dep">
						  <option value="">Seleccionar</option>
						  <option value="nada">Nada</option>
						  <option value="suave">Suave (2 días o menos)</option>
						  <option value="moderada">Media (3 o más)</option>
						  <option value="muy activa">Muy Activa (4 o más)</option>
						</select>
		    		
		 		</div>
		 		<div class="col-4">
		 			<label for="deportes">
					Deportes
					</label>
				   		<input type="text" class="form-control" name="deportes" placeholder="" value="{{ old('deportes') }}">


		 		</div>
			</div> <!-- FIN ROW -->

			<div class="row my-3 p-1">

				<div class="col-4">
					<label for="vegetariano">
					Vegetariano
					</label>
		    			
		    			<select class="form-control" name="vegetariano">
						  <option value="">Seleccionar</option>
						  <option value="si">Si</option>
						  <option value="no">No</option>
						  <option value="preferencia">Prefiere</option>
						  
						</select>
		    		
		 		</div>
				
		 		<div class="col-8">
		 			<label for="como">
					¿Cómo nos conoció?
					</label>
		    			<input type="text" class="form-control" name="como" placeholder="" value="{{ old('como') }}">
		    		
		 		</div>
		 		
			</div> <!-- FIN ROW -->
	</div>
</div>
</div>
<div class="my-4 p-3 bg-white rounded box-shadow">

	<h3>Recordatorio 24h</h1>

	<div class="row my-3 p-1">
				<div class="col-3">
					<label for="desayuno">
					Desayuno
					</label>
		    			<input type="text" class="form-control" name="desayuno" placeholder="" value="{{ old('desayuno') }}">
		    		
		 		</div>
		 		<div class="col-3">
		 			<label for="mmanana">
					Media Mañana
					</label>
		    			<input type="text" class="form-control" name="mmanana" placeholder="" value="{{ old('mmanana') }}">
		    		
		 		</div>
		 		<div class="col-3">
					<label for="almuerzo">
					Almuerzo
					</label>
		    			<input type="text" class="form-control" name="almuerzo" placeholder="" value="{{ old('almuerzo') }}">
		    		
		 		</div>
		 		<div class="col-3">
					<label for="merienda">
					Merienda
					</label>
		    			<input type="text" class="form-control" name="merienda" placeholder="" value="{{ old('merienda') }}">
		    		
		 		</div>
		 		<div class="col-3">
					<label for="cena">
					Cena
					</label>
		    			<input type="text" class="form-control" name="cena" placeholder="" value="{{ old('cena') }}">
		    		
		 		</div>
		 		
			</div> <!-- FIN ROW -->

	<p><input class="btn btn-primary" type="submit" value="Enviar"></p>

</div>
	</form>

@stop