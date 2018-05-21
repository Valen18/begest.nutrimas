@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	<h1>Editar Paciente</h1>
	
	<div class="row">
		
		<div class="col-6">
			<h3>Datos de Contacto</h3>
			<form 
				method="POST"
				action="{{ route('pacientes.update', $paciente->id) }}">
						
						{!! method_field('PUT') !!}
						{!! csrf_field() !!}

						<input name="role_id" type="hidden" value="3">
						<input name="password" type="hidden" value="nutrimas">
						<label>Sede: </label>
						<p>
							@foreach($sedes as $id => $nombre)
							
								<input class="form-check form-check-inline" 
								type="radio" 
								value="{{ $id }}"

								@if(in_array($id, $paciente->sedes->pluck('id')->toArray()))

									checked

						    	@endif
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
							<input class="form-control" type="text" name="nombre" value="{{ $paciente->nombre }}">
							{!! $errors->first('nombre', '<span class=error>:message</span>') !!}
							
						</p>
						<p>
							<label for="email">
							Email
							</label>
							<input class="form-control" type="email" name="email" value="{{ $paciente->email }}">
							{!! $errors->first('email', '<span class=error>:message</span>') !!}
							
							
						</p>
						<p>
							<label for="telefono">
							Teléfono
							</label>
							<input class="form-control" type="text" name="telefono" value="{{ $paciente->telefono }}">
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
		    			<input type="date" class="form-control" name="fecha_nac" placeholder="" 
		    			value="{{ $paciente->fecha_nac }}">
		    		
		 		</div>
		 		<div class="col-4">
		 			<label for="sexo">
					Sexo
					</label>
		    			<select class="form-control" name="sexo">
						  <option value="">Seleccionar</option>
						  <option value="hombre" 
						  @if($paciente->sexo === 'hombre')
						  	selected @endif>Hombre
						  </option>
						  <option value="mujer"  @if($paciente->sexo === 'mujer')
						  	selected @endif>Mujer</option>
						</select>

		    		
		 		</div>
		 		<div class="col-2">
					<label for="Altura">
					Altura
					</label>
		    			<input type="text" class="form-control" name="altura" placeholder="cms" value="{{$paciente->altura }}">
		    		
		 		</div>
		 		
			</div> <!-- FIN ROW -->

			<div class="row my-3 p-1">
				<div class="col-4">
		 			<label for="act_lab">
					Actividad Laboral
					</label>
				   		<select class="form-control" name="act_lab">
						  <option value="">Seleccionar</option>
						  <option value="desempleado" @if($paciente->act_lab === 'desempleado')selected @endif>Desempleado</option>
						  <option value="sedentaria" @if($paciente->act_lab === 'sedentaria')selected @endif>Sedentaria</option>
						  <option value="50% activa" @if($paciente->act_lab === '50% activa')selected @endif>50% Activa</option>
						  <option value="muy activa" @if($paciente->act_lab === 'muy activa')selected @endif>Muy Activa</option>
						</select>

		 		</div>

		 		<div class="col-4">
		 			<label for="act_dep">
					Actividad Deportiva
					</label>
		    			
		    			<select class="form-control" name="act_dep">
						  <option value="">Seleccionar</option>
						  <option value="nada" @if($paciente->act_dep === 'nada')selected @endif>Nada</option>
						  <option value="suave" @if($paciente->act_dep === 'suave')selected @endif>Suave (2 días o menos)</option>
						  <option value="moderada" @if($paciente->act_dep === 'moderada')selected @endif>Media (3 o más)</option>
						  <option value="muy activa" @if($paciente->act_dep === 'muy activa')selected @endif>Muy Activa (4 o más)</option>
						</select>
		    		
		 		</div>
		 		<div class="col-4">
		 			<label for="deportes">
					Deportes
					</label>
				   		<input type="text" class="form-control" name="deportes" placeholder="" value="{{ $paciente->deportes }}">


		 		</div>
			</div> <!-- FIN ROW -->

			<div class="row my-3 p-1">

				<div class="col-4">
					<label for="vegetariano">
					Vegetariano
					</label>
		    			
		    			<select class="form-control" name="vegetariano">
						  <option value="">Seleccionar</option>
						  <option value="si" @if($paciente->vegetariano === 'si')selected @endif>Si</option>
						  <option value="no" @if($paciente->vegetariano === 'no')selected @endif>No</option>
						  <option value="preferencia" @if($paciente->vegetariano === 'preferencia')selected @endif>Prefiere</option>
						  
						</select>
		    		
		 		</div>
				
		 		<div class="col-8">
		 			<label for="como">
					¿Cómo nos conoció?
					</label>
		    			<input type="text" class="form-control" name="como" placeholder="" value="{{ $paciente->como }}">
		    		
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
		    			<input type="text" class="form-control" name="desayuno" placeholder="" value="{{ $paciente->desayuno }}">
		    		
		 		</div>
		 		<div class="col-3">
		 			<label for="mmanana">
					Media Mañana
					</label>
		    			<input type="text" class="form-control" name="mmanana" placeholder="" value="{{ $paciente->mmanana }}">
		    		
		 		</div>
		 		<div class="col-3">
					<label for="almuerzo">
					Almuerzo
					</label>
		    			<input type="text" class="form-control" name="almuerzo" placeholder="" value="{{ $paciente->almuerzo }}">
		    		
		 		</div>
		 		<div class="col-3">
					<label for="merienda">
					Merienda
					</label>
		    			<input type="text" class="form-control" name="merienda" placeholder="" value="{{ $paciente->merienda }}">
		    		
		 		</div>
		 		<div class="col-3">
					<label for="cena">
					Cena
					</label>
		    			<input type="text" class="form-control" name="cena" placeholder="" value="{{ $paciente->cena }}">
		    		
		 		</div>
		 		
			</div> <!-- FIN ROW -->

	<p><input class="btn btn-primary" type="submit" value="Enviar"></p>

</div>
	</form>

@stop