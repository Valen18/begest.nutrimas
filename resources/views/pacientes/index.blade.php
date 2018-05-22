@extends('layout')

@section('contenido')
<div class="my-4 p-3 bg-white rounded box-shadow">
	<h1 class="d-inline-block">Listado de Pacientes</h1>
	<a class="d-inline-block float-right btn btn-xs btn-success" href="/pacientes/create">+ Nuevo Paciente</a>
</div>
<div class="my-4 p-3 bg-white rounded box-shadow">

		<table id="pacientes" class="table">
			<thead>
				<tr>
					<th>1ª Visita</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Sede</th>
					<th>Acciones</th>
				</tr>
			</thead>
		</table>

</div>

@stop
@section('scripts')
<script type="text/javascript">
		
	$('#pacientes').DataTable({
	 	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },

        processing: true,
        serverSide: true,
        render: true,  
        ajax: {
            url: '{{route('pacientes.getdata')}}',
            data: function (d) {
                d.sede = $('input[name=sede]').val();
            }
        },
        columns: [
           	{data: 'created_at', name: 'created_at'},
            {data: 'nombre', name: 'nombre'},
            {data: 'email', name: 'email'},
            {data: 'telefono', name: 'telefono'},
            {data: 'sedes', name: 'sedes'},
            {data: 'editar', name: 'editar', orderable: false, searchable: false}
          
     ]

    });
	$('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
	$('#pacientes').removeClass( 'form-inline' );

</script>
@stop

