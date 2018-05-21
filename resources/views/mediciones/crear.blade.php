@extends('layout')



@section('contenido')
<script type="text/javascript">

	function calculaIMC(){
	  //declaramos las variables
	  var peso, altura, imc;
	  //recogemos los datos.
	  //Suponemos que los campos
	  //tienen esos Id.
	  //El peso en KG y la altura en cm
	  //para operar mejor
	  peso=$('#peso').val();
	  altura=$('#altura').val();
	  //comprobamos que los campos
	  //no vengan vacíos
	  if(peso!="" && altura!=""){
	    //aplicamos la fórmula
	    altura = parseInt(altura)/100;
	    imc = peso/(altura*altura);
	   	imc = imc.toFixed(2);

	   	if(imc<=18.5)
	   	{
	   		return "<div class='text-center alert alert-danger' role='alert'> "+ imc + "<br> Por debajo del peso</div>";
	   	} else if (imc <=24.9){
	   		return "<div class='text-center alert alert-info' role='alert'> "+ imc + "<br> Peso saludable</div>";
	  	} else if (imc <=29.9){
	  		return "<div class='text-center alert alert-warning' role='alert'> "+ imc + "<br> Sobrepeso</div>";
	  	} else if (imc <=39.9){
	  		return "<div class='text-center alert alert-danger' role='alert'> "+ imc + "<br> Obesidad</div>";
	  	} else{
	  		return "<div class='text-center alert alert-danger' role='alert'> "+ imc + "<br> Obesidad de riesgo</div>";
	  	}
	}
}
	$(document).ready(function(){
		$("#peso").keyup(function(){
    		
    		$('#imc').html(calculaIMC());

		}); 

   		$("#peso").change(function(){
    		
    		$('#imc').html(calculaIMC());

		}); 
	});

</script>

<div class="my-4 p-3 bg-white rounded box-shadow">

<form 
		method="POST"
		action="{{ route('medicion.store') }}">
				
				{!! csrf_field() !!}
				<input type="hidden" id="altura" name="altura" value="{{ $paciente->altura }}">
				<input type="hidden" name="usuario_id" value="{{ $paciente->id }}">
	<div class="row">
		<div class="col-6">
			<h3 class="border-bottom">Bioimpedancia</h3>
				<div class="row">
					<p class="col-4">
						<label for="peso">
						Peso
						<input class="form-control" id="peso" type="number" step="0.01" name="peso" value="{{ old('peso') }}">
						{!! $errors->first('peso', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="grasa">
						Grasa
						<input class="form-control" type="number" step="0.01" name="grasa" value="{{ old('grasa') }}">
						{!! $errors->first('grasa', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="liquido">
						Liquido
						<input class="form-control" type="number" step="0.01" name="liquido" value="{{ old('liquido') }}">
						{!! $errors->first('liquido', '<span class=error>:message</span>') !!}
						</label>
					</p>
				</div>
				<div class="row">
					<p class="col-4">
						<label for="musculo">
						Músculo
						<input class="form-control" type="number" step="0.01" name="musculo" value="{{ old('musculo') }}">
						{!! $errors->first('musculo', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="metabolismo">
						Metabolismo
						<input class="form-control" type="number" step="0.01" name="metabolismo" value="{{ old('metabolismo') }}">
						{!! $errors->first('metabolismo', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="g_visceral">
						Grasa Visceral
						<input class="form-control" type="number" step="0.01" name="g_visceral" value="{{ old('g_visceral') }}">
						{!! $errors->first('g_visceral', '<span class=error>:message</span>') !!}
						</label>
					</p>
				</div>
				<div class="row">
					<p class="col-4">
						<label for="indice">
						Índice Físico
						<input class="form-control" type="number" step="0.01" name="indice" value="{{ old('indice') }}">
						{!! $errors->first('indice', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="edad_fisica">
						Edad Física
						<input class="form-control" type="number" step="0.01" name="edad_fisica" value="{{ old('edad_fisica') }}">
						{!! $errors->first('edad_fisica', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label class="h4">IMC: <span id="imc"></span></label>
					</p>
				</div>
		</div>

		<div class="col-6">
			<h3 class="border-bottom">Contornos</h3>
				
				<div class="row">
					<p class="col-4">
						<label for="c_pecho">
						Pecho
						<input class="form-control" type="number" step="0.01" name="c_pecho" value="{{ old('c_pecho') }}">
						{!! $errors->first('c_pecho', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="c_cintura">
						Cintura
						<input class="form-control" type="number" step="0.01" name="c_cintura" value="{{ old('c_cintura') }}">
						{!! $errors->first('c_cintura', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="c_cadera">
						Cadera
						<input class="form-control" type="number" step="0.01" name="c_cadera" value="{{ old('c_cadera') }}">
						{!! $errors->first('c_cadera', '<span class=error>:message</span>') !!}
						</label>
					</p>
				</div>
				<div class="row">
					<p class="col-4">
						<label for="c_brazos">
						Brazos
						<input class="form-control" type="number" step="0.01" name="c_brazos" value="{{ old('c_brazos') }}">
						{!! $errors->first('c_brazos', '<span class=error>:message</span>') !!}
						</label>
					</p>
					<p class="col-4">
						<label for="c_piernas">
						Piernas
						<input class="form-control" type="number" step="0.01" name="c_piernas" value="{{ old('c_piernas') }}">
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