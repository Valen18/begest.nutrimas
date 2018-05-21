@extends('layout')

@section('contenido')
<div class="card mt-2">
		<div class="card-header">
		   CONFIRMACIÓN DE ASISTENCIA
		</div>
 		<div class="card-body">
 			<div class="row">
				<div class="col-6">
					<h2>Valentín Ayesa</h2>
					<ul class="list-group">
						<li class="list-group-item">Fecha: </li>
						<li class="list-group-item">Bono: </li>
						<li class="list-group-item">Sesión: </li>
						<li class="list-group-item">Sesiones restantes: </li>
					</ul>
				</div>
				<div class="col-6">
					<div id="signature-pad" class="signature-pad">
					    <div class="signature-pad--body">
					      <canvas class="border" width="510" height="200"></canvas>
					    </div>
					    <div class="signature-pad--footer float-right">
					      <div class="description"></div>

					      <div class="signature-pad--actions">
					        <div>
					          <button type="button" class="btn clear" data-action="clear">Limpiar</button>
					          <button type="button" class="btn btn-success save" data-action="save">Guardar</button>
					        </div>
					      </div>
					    </div>
				  	</div> <!-- FIN SIGNATURE PAD -->
				</div>
			</div>
		</div>
</div>
<div class="card mt-2">
		<div class="card-header">
		    CLAUSULA INFORMATIVA
		</div>
 		<div class="card-body small">
			Los datos personales que nos facilites serán incluidos en los ficheros titularidad de Nutrimas, con la finalidad de enviarle información de carácter comercial, por cualquier medio, de las actividades, productos y promociones relacionados con la nutrición y la dietética. También será incluida en su ficha electrónica de cliente con objeto de ofrecer un trato personalizado. En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, le informamos que podrá consultar sus datos personales o ejercer su derecho de acceso, rectificación, supresión, oposición, limitación del tratamiento, portabilidad de los datos y a no ser objeto de decisiones individualizadas automatizadas (incluida la elaboración de perfiles), lo notificarán por escrito a la dirección c/ Navarro Caro, 97. Tomares. Sevilla
 		</div>
</div>
 

  <script src="/js/signature_pad.umd.js"></script>
  <script type="text/javascript">
  	
  	var wrapper = document.getElementById("signature-pad");
	var clearButton = wrapper.querySelector("[data-action=clear]");
	var changeColorButton = wrapper.querySelector("[data-action=change-color]");
	var undoButton = wrapper.querySelector("[data-action=undo]");
	var saveJPGButton = wrapper.querySelector("[data-action=save]");
	var canvas = wrapper.querySelector("canvas");
	
	var signaturePad = new SignaturePad(canvas, {
	  // It's Necessary to use an opaque color when saving image as JPEG;
	  // this option can be omitted if only saving as PNG or SVG
	  backgroundColor: 'rgb(255, 255, 255)'
	});

	function download(dataURL, filename) {
	  var blob = dataURLToBlob(dataURL);
	  var url = window.URL.createObjectURL(blob);

	  var a = document.createElement("a");
	  a.style = "display: none";
	  a.href = url;
	  a.download = filename;

	  document.body.appendChild(a);
	  a.click();

	  window.URL.revokeObjectURL(url);
	}

	function dataURLToBlob(dataURL) {
	  // Code taken from https://github.com/ebidel/filer.js
	  var parts = dataURL.split(';base64,');
	  var contentType = parts[0].split(":")[1];
	  var raw = window.atob(parts[1]);
	  var rawLength = raw.length;
	  var uInt8Array = new Uint8Array(rawLength);

	  for (var i = 0; i < rawLength; ++i) {
	    uInt8Array[i] = raw.charCodeAt(i);
	  }

	  return new Blob([uInt8Array], { type: contentType });
	}
	clearButton.addEventListener("click", function (event) {
	  signaturePad.clear();
	});
	

	saveJPGButton.addEventListener("click", function (event) {
	  if (signaturePad.isEmpty()) {
	    alert("Please provide a signature first.");
	  } else {
	    var dataURL = signaturePad.toDataURL("image/jpeg");
	    download(dataURL, "signature.jpg");
	  }
	});

  </script>
@stop




