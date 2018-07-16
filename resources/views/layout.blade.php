<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">


	<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />

	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>{{$tituloHead ?? 'Begest'}}</title>
	<script src="/js/all.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>


</head>
<body>
	<?php 
			function activeMenu($url){
				return request()->is($url) ? 'active' : '';
			} 
	?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">
		  	<svg class="d-inline-block align-top" width="36" height="36" viewBox="0 0 612 612" xmlns="http://www.w3.org/2000/svg" focusable="false"><title>Bootstrap</title><path fill="currentColor" d="M510 8a94.3 94.3 0 0 1 94 94v408a94.3 94.3 0 0 1-94 94H102a94.3 94.3 0 0 1-94-94V102a94.3 94.3 0 0 1 94-94h408m0-8H102C45.9 0 0 45.9 0 102v408c0 56.1 45.9 102 102 102h408c56.1 0 102-45.9 102-102V102C612 45.9 566.1 0 510 0z"></path><path fill="currentColor" d="M196.77 471.5V154.43h124.15c54.27 0 91 31.64 91 79.1 0 33-24.17 63.72-54.71 69.21v1.76c43.07 5.49 70.75 35.82 70.75 78 0 55.81-40 89-107.45 89zm39.55-180.4h63.28c46.8 0 72.29-18.68 72.29-53 0-31.42-21.53-48.78-60-48.78h-75.57zm78.22 145.46c47.68 0 72.73-19.34 72.73-56s-25.93-55.37-76.46-55.37h-74.49v111.4z"></path></svg>
    BeGest
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link {{ activeMenu('/') }}" href="/">Inicio <span class="sr-only">(actual)</span></a>
      </li>
     	 @if(auth()->user()->hasRoles(['admin']))
			<li class="nav-item">
	        	<a class="nav-link {{ activeMenu('sedes*') }}"  href="/sedes">Sedes</a>
	      	</li>     
	     @endif

	     @if(auth()->user()->hasRoles(['admin']))
			<li class="nav-item">
	        	<a class="nav-link {{ activeMenu('empleados*') }}"  href="/empleados">Empleados</a>
	      	</li>     
	     @endif

	    
	     @if(auth()->user()->hasRoles(['admin', 'empleado']))
	      <li class="nav-item">
	        <a class="nav-link {{ activeMenu('pacientes*') }}" href="/pacientes">Pacientes</a>
	      </li>
	     @endif
    </ul>
  </div>

 <div class="pull-right">
 	<ul class="navbar-nav mr-auto">
 				@if(auth()->guest())
 					<a class="nav-link" href="/login">Login</a>
 				@else
 					<a class="btn btn-secondary mr-1" href="/login"><span class="oi oi-envelope-closed" title="envelope" aria-hidden="true"></span></a>
	 				<div class="dropdown open">
	 					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 						Hola {{auth()->user()->nombre}}
	 					</button>
	 					<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
	 						@if(auth()->user()->hasRoles(['admin','empleado']))
	 							<a class="dropdown-item" href="/empleados/{{auth()->user()->id}}/edit">Mis Datos</a>
	 						@else
								<a class="dropdown-item" href="/pacientes/{{auth()->user()->id}}/edit">Mis Datos</a>
	 						@endif
	 						<a class="dropdown-item" href="/logout">Salir</a>		
	 					</div>
	 				</div>
     			@endif
 	</ul>
 </div>
</nav>	</header>
		
<div class='container'>
	@yield('contenido')
</div>

	
{!! Html::script('js/libs/jquery/jquery-2.1.4.min.js') !!}
{!! Html::script('js/plugin/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('js/plugin/datatables/dataTables.bootstrap.min.js') !!}
@yield('scripts')

</body>
</html>