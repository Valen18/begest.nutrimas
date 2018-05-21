@extends('layout')

@section('contenido')  

		
  		<div class="card">
  			<div class="card-body">
				<h1 class="display-5">{{ $paciente->nombre }} <small class="text-muted">{{ $paciente->telefono }} &bull; {{ $paciente->email }}</small>@if(auth()->user()->hasRoles(['admin', 'empleado']))<a href="/pacientes/{{$paciente->id}}/edit" class="float-right btn btn-warning btn-sm">Editar Paciente</a>@endif</h1>
  			</div>
		</div>

		<div class="card my-3 p-3">
  			<div class="card-body">
  				
  				<div class="row">
						<div class="col-6">
							<h1 class="display-5 border-bottom">Datos Personales</h1>
							<ul>
								<li><b>Sede:</b> 
									@foreach($paciente->sedes as $sede)
										{{ $sede->nombre }}
									@endforeach
								</li>
								<li><b>Fecha de Nacimiento:</b> {{ $paciente->fecha_nac }}</li>
								<li><b>Sexo:</b> {{ $paciente->sexo }}</li>
								<li><b>Altura:</b> {{ $paciente->altura }}</li>
								<li><b>Actividad Laboral:</b> {{ $paciente->act_lab }}						
								</li>
								<li><b>Actividad Deportiva:</b> {{ $paciente->act_dep }}</li>
								<li><b>Deportes:</b> {{ $paciente->deportes }}</li>
								<li><b>Vegetariano:</b> {{ $paciente->vegetariano }}</li>
								<li><b>Como nos conoció:</b> {{ $paciente->como }}</li>
							</ul>
						</div>
						<div class="col-6">
							<h1 class="display-5 border-bottom">Recordatorio 24h</h1>
							
								<div class="row">
									<div class="col-6">
										<p><b>Desayuno:</b><br /> {{ $paciente->desayuno }}</p>
										<p><b>Almuerzo:</b><br /> {{ $paciente->almuerzo }}</p>
										<p><b>Cena:</b><br /> {{ $paciente->cena }}</p>
									</div>
									
									<div class="col-6">
										<p><b>Media Mañana:</b><br /> {{ $paciente->mmanana }}</p>
										<p><b>Merienda:</b><br /> {{ $paciente->merienda }}</p>
									</div>

								</div>						
							
						</div>
  				</div>
  			</div>
  		</div> <!-- fin seccion -->

  		<div class="card my-3">
			  
			  <div class="card-header">
			    <ul class="nav nav-tabs card-header-tabs" id="datosPaciente" role="tablist">
			      <li class="nav-item">
			        <a class="nav-link active" 
			        		id="mediciones-tab" 
			        		data-toggle="tab"
			        		href="#mediciones" 
			        		role="tab" 
			        		aria-controls="mediciones" 
			        		aria-selected="true">MEDICIONES</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" 
			        		id="entrenamientos-tab" 
			        		data-toggle="tab"
			        		href="#entrenamientos" 
			        		role="tab" 
			        		aria-controls="entrenamientos" 
			        		aria-selected="true">ENTRENAMIENTOS</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" 
			        		id="bonos-tab" 
			        		data-toggle="tab"
			        		href="#bonos" 
			        		role="tab" 
			        		aria-controls="bonos" 
			        		aria-selected="true">BONOS</a>
			      </li>
			    </ul>
			  </div>
			  
			  <div class="card-body tab-content" id="myTabContent">
					<div class="tab-pane fade show active" data-target="#mediciones" id="mediciones" role="tabpanel">
						@if(session()->has('info'))
							<div class="alert alert-success">{{session('info')}}</div>
						@endif
						<h3 class="float-left">Mediciones</h3>
						@if(auth()->user()->hasRoles(['admin', 'empleado']))
							<a href="/medicion/create/{{$paciente->id}}" class="btn btn-sm btn-success float-right">+ Nueva medición</a>
						@endif
						<table class="table table-striped table-hover table-bordered">
							
							<tbody>

								@foreach($paciente->mediciones->sortByDesc('created_at') as $medicion)
									
									<tr class="text-center">
										<td class="align-middle" rowspan="2" width="100"><small>{{Carbon\Carbon::parse($medicion->created_at)->format('d-m-Y')}}</small></td>

										<th>Peso</th>
										<th>Grasa</th>
										<th>Líquido</th>
										<th>Músculo</th>
										<th>G.Viscer.</th>
										<th>E.Física</th>
										<th>C.Pecho</th>
										<th>C.Cintura</th>
										<th>C.Cadera</th>
										<th>C.Brazos</th>
										<th>C.Piernas</th>
										@if(auth()->user()->hasRoles(['admin', 'empleado']))<th>Acción</th>@endif
										
									</tr>
									<tr class="text-center">
										<td>{{$medicion->peso}} kg</td>
										<td>{{$medicion->grasa}} %</td>
										<td>{{$medicion->liquido}} %</td>
										<td>{{$medicion->musculo}} kg</td>
										<td>{{$medicion->g_visceral}}</td>
										<td>{{$medicion->edad_fisica}}</td>

										<td>{{$medicion->c_pecho}} cms</td>
										<td>{{$medicion->c_cintura}} cms</td>
										<td>{{$medicion->c_cadera}} cms</td>
										<td>{{$medicion->c_brazos}} cms</td>
										<td>{{$medicion->c_piernas}} cms</td>

										@if(auth()->user()->hasRoles(['admin', 'empleado']))<td><a href="/medicion/{{$medicion->id}}/edit" class="btn btn-primary btn-sm"><span class="oi oi-pencil" title="pencil" aria-hidden="true"></span></a>
										<form style="display: inline;" method="POST" action="{{ route('medicion.destroy', $medicion->id) }}">
										{!! csrf_field() !!}
										{!! method_field('DELETE') !!}
											<button class="btn btn-sm btn-danger" type="submit"><span class="oi oi-trash" title="trash" aria-hidden="true"></span></button>
										</form>
										</td>	
										@endif					
									</tr>

								@endforeach
							</tbody>
						</table>

						<h3>Evolución</h3>
						<canvas id="myChart" width="400" height="200"></canvas>
						

						<script>
							var ctx = document.getElementById("myChart");
							var myChart = new Chart(ctx, {
							    type: 'line',
							    data: {
							        labels: {!! json_encode($mediciones) !!},
							       
							        datasets: [
							        {
							            label: 'Grasa',
							            data: {!! json_encode($grasa) !!},
							            backgroundColor: [
							                'rgba(255, 99, 132, 0.5)'
							            ],
							            borderColor: [
							                'rgba(255,99,132,1)'
							            ],
							            borderWidth: 1
							        },
							        {
							            label: 'Músculo',
							            data: {!! json_encode($musculo) !!},
							            backgroundColor: [
							                'rgba(169, 83, 3, 0.4)'
							                
							            ],
							            borderColor: [
							                ' rgba(169, 83, 3, 1)'
							                
							            ],
							            borderWidth: 1
							        },
							        {
							            label: 'Peso',
							            data: {!! json_encode($peso) !!},
							            backgroundColor: [
							                'rgba(0, 240, 152, 0.2)'
							                
							            ],
							            borderColor: [
							                ' rgba(0, 240, 152, 1)'
							                
							            ],
							            borderWidth: 1
							        }]
							    },
							    options: {
							        scales: {
							            yAxes: [{
							                ticks: {
							                    beginAtZero:false
							                }
							            }]
							        }
							    }
							});
							</script>
					</div>
  					<div class="tab-pane fade" data-target="#entrenamientos" id="entrenamientos" role="tabpanel">
						
						<h3 class="float-left">Entrenamientos</h3>
						@if(auth()->user()->hasRoles(['admin', 'empleado']))
							<a href="#" class="btn btn-sm btn-success float-right">+ Nuevo entrenamiento</a>
						@endif
  					</div>

  					<div class="tab-pane fade" data-target="#bonos" id="bonos" role="tabpanel">
						
						<h3 class="float-left">Bonos</h3>
						@if(auth()->user()->hasRoles(['admin', 'empleado']))
							<a href="{{ route('bonos.asignar', $paciente->id) }}" id="nuevoBono" class="btn btn-sm btn-success float-right">+ Nuevo bono</a>
						@endif
						
						<table class="table table-striped table-hover table-bordered">
							
							

								
								<tr class="text-center">
									<th>Contratado</th>
									<th>Última visita</th>
									<th>Nombre</th>
									<th>Sesiones</th>
									<th>Asistencia</th>
									
									<th>&nbsp;</th>
								</tr>
								
								@foreach($paciente->bonos->sortByDesc('created_at') as $bono)
									
									<tr class="text-center">
										<td>{{Carbon\Carbon::parse($bono->pivot->created_at)->format('d-m-Y')}}</td>
										<td>{{Carbon\Carbon::parse($bono->pivot->updated_at)->format('d-m-Y')}}</td>
										<td>{{$bono->nombre}}</td>
										<td>{{$bono->sesiones}}</td>
										<td>{{$bono->pivot->asistencia}}</td>
										
										
											<td><a class="btn btn-sm btn-success" 
													href="{{ route('firma.show', $bono->pivot->id) }}">
													
													<span class="oi oi-magnifying-glass" title="magnifying-glass" aria-hidden="true"></span>

												</a>
											</td>
										
											
									</tr>
								@endforeach

						</table>
  					</div>
			  </div>
		</div>

@stop