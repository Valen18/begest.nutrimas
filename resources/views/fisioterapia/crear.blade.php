@extends('layout')

@section('contenido')

	<div class="card">
  			<div class="card-body">
				<h1 class="display-5">Nueva consulta de Fisioterapia - {{ $paciente->nombre }}</h1>
				<form 
				method="POST"
				action="{{ route('fisio.store', $paciente->id) }}">

				<input type="hidden" value="{{$paciente->id}}" name="usuario_id" />
				{!! csrf_field() !!}
				
						
				<p>
					<label for="tratamiento">
					Tratamiento
					</label>
					<input class="form-control" type="text" name="tratamiento" value="{{ old('tratamiento') }}">
					{!! $errors->first('tratamiento', '<span class=error>:message</span>') !!}
					
				</p>
				<p>
					<label for="evoeva">
					Evo. Eva
					</label>
		    			<select class="form-control" name="evoeva">
						  <option value="">Seleccionar</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="1">3</option>
						  <option value="2">4</option>
						  <option value="1">5</option>
						  <option value="2">6</option>
						  <option value="1">7</option>
						  <option value="2">8</option>
						  <option value="2">9</option>
						  <option value="2">10</option>
						</select>
				</p>
				<p>
					<label for="evotonomusc">
					Evo. Tono Muscular
					</label>
		    			<select class="form-control" name="evotonomusc">
						  <option value="">Seleccionar</option>
						  <option value="hipertonia">Hipertonía</option>
						  <option value="hipotonia">Hipotonía</option>
						  <option value="normal">Normal</option>
						</select>					
				</p>
				<p>
					<textarea name="observaciones">{{ old('observaciones') }}</textarea>
				</p>		
		</div>
	
		<p><input class="btn btn-primary" type="submit" value="Enviar"></p>

	</div>
	</form>
  			</div>


	</div>

@stop