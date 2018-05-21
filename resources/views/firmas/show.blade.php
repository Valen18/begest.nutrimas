@extends('layout')

@section('contenido')
@if($contratoActivo->asistencia < $bonoActivo->sesiones)
	<div class="card mt-2">
			<div class="card-header">
	Confirmación de Asistencia
			</div>
	 		<div class="card-body">
	 			<div class="row">
					<div class="col-6">
						<h2>{{ $usuarioActivo->nombre }}</h2>
						<ul class="list-group">
							<li class="list-group-item">Fecha: {{ date('d-m-Y') }}</li>
							<li class="list-group-item">Bono: {{ $bonoActivo->nombre }}</li>
							<li class="list-group-item">Sesión: {{ $contratoActivo->asistencia + 1}}</li>
							<li class="list-group-item">Sesiones restantes: {{$bonoActivo->sesiones - ($contratoActivo->asistencia+1)}}</li>
						</ul>
					</div>
					<div class="col-6">
						<p>Su firma:</p>
						<div id="signature-pad" class="signature-pad">
						    <div class="signature-pad--body">
						      <canvas class="border" width="510" height="200"></canvas>
						      	<form action="{{ route('firma.store') }}" method="POST">   
						      		{!! csrf_field() !!}
						      		<input type="hidden" id="usuarioxbono_id" name="usuarioxbono_id" value="{{ $contratoActivo->id }}">
						      		<input type="hidden" id="usuarioActivo" name="usuarioActivo" value="{{ $usuarioActivo->id }}">
						      		<input type="hidden" id="firma" name="firma" value="">
	    							
	    							<input type="text" name="observaciones" placeholder="Observaciones...">
		
						    </div>
						    <div class="signature-pad--footer float-right">
						      <div class="description"></div>
								
						      <div class="signature-pad--actions">
						        <div>
						          <button type="button" class="btn clear" data-action="clear">Limpiar</button>
						          <button type="submit" class="btn btn-success save" data-action="save">Guardar</button>
						        </div>
						        </form>
						      </div>
						    </div>
					  	</div> <!-- FIN SIGNATURE PAD -->
					</div>
				</div>
			</div>
	</div>
	<div class="card mt-2">
			<div class="card-header">
			    Clausula Informativa
			</div>
	 		<div class="card-body small">
				Los datos personales que nos facilites serán incluidos en los ficheros titularidad de Nutrimas, con la finalidad de enviarle información de carácter comercial, por cualquier medio, de las actividades, productos y promociones relacionados con la nutrición y la dietética. También será incluida en su ficha electrónica de cliente con objeto de ofrecer un trato personalizado. En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, le informamos que podrá consultar sus datos personales o ejercer su derecho de acceso, rectificación, supresión, oposición, limitación del tratamiento, portabilidad de los datos y a no ser objeto de decisiones individualizadas automatizadas (incluida la elaboración de perfiles), lo notificarán por escrito a la dirección c/ Navarro Caro, 97. Tomares. Sevilla
	 		</div>
	</div>
@else
<div class="card mt-2">
	<div class="card-body ">
		<h2 class="float-left">Bono Terminado</h2>
		@if(auth()->user()->hasRoles(['admin', 'empleado']))
			<a href="{{ route('bonos.asignar', $usuarioActivo->id) }}" id="nuevoBono" class="btn btn-md btn-success float-right">+ Nuevo bono</a>
		@endif
	</div>
</div>
@endif
<div class="card mt-2">
		<div class="card-header">
		    Firmas pasadas
		</div>
 		<div class="card-body small">
 			<table class="table table-striped table-hover table-bordered">
 				<thead>
 					<th>Fecha</th>
 					<th>Firma</th>
 					<th>Observación</th>
 				</thead>
 				<tbody>
 					@foreach($contratoActivo->firmas as $firma)
						<tr>
							<td>{{Carbon\Carbon::parse($firma->created_at)->format('d-m-Y')}}</td>
							<td><img src="{{ $firma->firma }}" width="400"></td>
							<td>{{ $firma->observaciones }}</td>
						</tr>
 					@endforeach
 				</tbody>
 			</table>
 		</div>
</div>

  <script src="/js/signature_pad.umd.js"></script>
  <script type="text/javascript">
  	
  	var wrapper = document.getElementById("signature-pad");
	var clearButton = wrapper.querySelector("[data-action=clear]");
	var canvas = wrapper.querySelector("canvas");
	
	var signaturePad = new SignaturePad(canvas, {
	  // It's Necessary to use an opaque color when saving image as JPEG;
	  // this option can be omitted if only saving as PNG or SVG
	  backgroundColor: 'rgb(255, 255, 255)'
	});
		
	wrapper.addEventListener("click", function (event) {
		var dataurl = dataURL();

		$('#firma').val(dataurl);
	});
	
	function dataURL(){
		var dataURL = signaturePad.toDataURL("image/jpeg");
		return dataURL;
	}
	clearButton.addEventListener("click", function (event) {
	  signaturePad.clear();
	});
  </script>
@stop




