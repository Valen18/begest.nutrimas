@extends('layout')

@section('contenido')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
     <h1 class="display-4">Bienvenido {{ $usuario->nombre }}</h1>
    <p class="lead">A continuación podrás ver un breve resumen de tu actividad en Begest.</p>
  </div>
</div>
<div class="row">
  <div class="col">
  	
  	<div class="card">
  		<div class="card-header text-white bg-dark">Últimos pacientes <a href="/pacientes/create" type="button" class="float-right btn btn-success btn-sm">+ Nuevo</a></div>
  		<div class="card-body">
  			<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Nombre</th>
			        <th>Email</th>
			        <th>Teléfono</th>
			      </tr>
			    </thead>
			    <tbody>
				  
			    </tbody>
  			</table>

  		</div> 
      
	 </div>
  </div>
  <div class="col">
  	
  	<div class="card">
  		<div class="card-header text-white bg-dark">Próximas citas <a type="button" href="#" class="float-right btn btn-success btn-sm">+ Agendar cita</a></div>
  		<div class="card-body">Próximamente</div> 
	</div>

  </div>
</div>
@stop