@extends('layout')

@section('contenido')
	
	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	     <h1 class="display-4">Bienvenido {{$paciente->nombre}}</h1>
	    <p class="lead">A continuación podrás ver un breve resumen de tu actividad en Begest.</p>
	  </div>
	</div>
	
@stop