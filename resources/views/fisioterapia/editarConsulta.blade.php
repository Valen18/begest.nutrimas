@dd($bono)
@extends('layout')

@section('contenido')
	<div class="card">
  			<div class="card-body">
				<h1 class="display-5">Editar bono asignado</h1>
				<h3>Bonos disponibles:</h3>
				<form 
					method="POST"
					action="{{ route('bonos.asignausuario', $paciente->id) }}">

					{!! csrf_field() !!}
					<select class="form-control-lg" name="bonos">
						@foreach($bonos as $bono)
							
							<option  value="{{$bono->id}}">{{$bono->nombre}} - {{$bono->sesiones}} Sesiones

						@endforeach
					</select>

					<p class="mt-2"><input class="mr-2 btn btn-success btn-lg" type="submit" value="Enviar">
					<a href="{{ url()->previous() }}" class="float-right btn btn-info btn-lg">Volver</a></p>
				</form>
  			</div>


	</div>
@stop