@extends('layout')



@section('contenido')


<div class="my-4 p-3 bg-white rounded box-shadow">

<form 
		method="POST"
		action="{{ route('medicion.update', $medicion->id) }}">
				
				{!! method_field('PUT') !!}
				{!! csrf_field() !!}
				
				<input type="hidden" name="id" value="{{$medicion->id}}" >
				<input type="hidden" name="usuario_id" value="{{$medicion->usuario_id}}" >
				
	<div class="row">
		<div class="col-6">
			<h3 class="border-bottom">Bioimpedancia</h3>
				<div class="row">
					<p class="col-4">
						<label for="peso">
						Peso
						<input class="form-control" id="peso" type="number" step="0.01" name="peso" 
						value="{{ $medicion->peso }}">
						{!! $errors->first('peso', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="grasa">
						Grasa
						<input class="form-control" type="number" step="0.01" name="grasa" value="{{ $medicion->grasa }}">
						{!! $errors->first('grasa', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="liquido">
						Liquido
						<input class="form-control" type="number" step="0.01" name="liquido" value="{{ $medicion->liquido }}">
						{!! $errors->first('liquido', '<span class=error>:message</span>') !!}
						</label>
					</p>
				</div>
				<div class="row">
					<p class="col-4">
						<label for="musculo">
						Músculo
						<input class="form-control" type="number" step="0.01" name="musculo" value="{{ $medicion->musculo }}">
						{!! $errors->first('musculo', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="metabolismo">
						Metabolismo
						<input class="form-control" type="number" step="0.01" name="metabolismo" value="{{ $medicion->metabolismo }}">
						{!! $errors->first('metabolismo', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="g_visceral">
						Grasa Visceral
						<input class="form-control" type="number" step="0.01" name="g_visceral" value="{{ $medicion->g_visceral }}">
						{!! $errors->first('g_visceral', '<span class=error>:message</span>') !!}
						</label>
					</p>
				</div>
				<div class="row">
					<p class="col-4">
						<label for="indice">
						Índice Físico
						<input class="form-control" type="number" step="0.01" name="indice" value="{{ $medicion->indice }}">
						{!! $errors->first('indice', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="edad_fisica">
						Edad Física
						<input class="form-control" type="number" step="0.01" name="edad_fisica" value="{{ $medicion->edad_fisica }}">
						{!! $errors->first('edad_fisica', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="created_at">Fecha de la Medición: <input class="form-control" type="datetime" name="created_at" value="{{Carbon\Carbon::parse($medicion->created_at)->format('Y-m-d H:i:s')}}"></label>
					</p>
				</div>
		</div>

		<div class="col-6">
			<h3 class="border-bottom">Contornos</h3>
				
				<div class="row">
					<p class="col-4">
						<label for="c_pecho">
						Pecho
						<input class="form-control" type="number" step="0.01" name="c_pecho" value="{{ $medicion->c_pecho }}">
						{!! $errors->first('c_pecho', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="c_cintura">
						Cintura
						<input class="form-control" type="number" step="0.01" name="c_cintura" value="{{ $medicion->c_cintura }}">
						{!! $errors->first('c_cintura', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="c_cadera">
						Cadera
						<input class="form-control" type="number" step="0.01" name="c_cadera" value="{{ $medicion->c_cadera }}">
						{!! $errors->first('c_cadera', '<span class=error>:message</span>') !!}
						</label>
					</p>
				</div>
				<div class="row">
					<p class="col-4">
						<label for="c_brazos">
						Brazos
						<input class="form-control" type="number" step="0.01" name="c_brazos" value="{{ $medicion->c_brazos }}">
						{!! $errors->first('c_brazos', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="c_piernas">
						Piernas
						<input class="form-control" type="number" step="0.01" name="c_piernas" value="{{ $medicion->c_piernas }}">
						{!! $errors->first('c_piernas', '<span class=error>:message</span>') !!}
						</label>
					</p>
					
				</div>
				<div class="mt-5 float-right">
					<p><input class="mr-2 btn btn-success btn-lg" type="submit" value="Enviar">
					<a href="{{ url()->previous() }}" class="float-right btn btn-info btn-lg">Volver</a></p>
				</div>
		</div>
		
		
	</div>
</form>
</div>
	

@stop