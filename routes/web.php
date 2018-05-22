<?php

	

	// RUTAS PRINCIPALES

	Route::get('/', ['as' => 'inicio', 'uses' => 'PagesController@inicio']);
	
	Route::get('signature', function(){
		return view('signature');
	});
	// MEDICIONES
	
	Route::get('medicion/create/{id}', 'MedicionController@create'); // {RECIBE EL ID USUARIO}
	Route::get('medicion/{id}/edit', 'MedicionController@edit')->name('medicion.edit'); // {RECIBE EL ID DE LA MEDICION}
	Route::put('medicion/{id}/update', 'MedicionController@update')->name('medicion.update');
	
	Route::get('pacientes/getdata', 'PacientesController@getData')->name('pacientes.getdata');
	
	Route::resource('paciente', 'PacienteController');
	Route::resource('pacientes', 'PacientesController');
	Route::resource('firma', 'FirmasController');

	Route::resource('medicion', 'MedicionController');

	Route::get('empleados/getdata', 'EmpleadosController@getdata')->name('empleados.getdata');
		Route::resource('empleados', 'EmpleadosController');
	Route::resource('sedes', 'SedesController');

	Route::get('bonos/asignar/{id}', 'BonosController@asignar')->name('bonos.asignar');
	Route::post('bonos/asignar/{id}', 'BonosController@asignausuario')->name('bonos.asignausuario');
	Route::put('bonos/asistencia/{id}', 'BonosController@asistencia')->name('bonos.asistencia');

	Route::get('bonos/{id}/editAsign', 'BonosController@editAsign')->name('bonos.editAsign');
	Route::delete('bonos/destroyAsign/{id}', 'BonosController@destroyAsign')->name('bonos.destroyAsign');



	Route::resource('bonos', 'BonosController');

	// LOGIN DE USUARIOS
	Route::get('login', ['as' => 'login', 'uses' => 
		'Auth\LoginController@showLoginForm']);
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout');

	
	// RUTAS TESTS

	// Crear paciente de pruebas
	Route::get('testAdmin', function(){
	   $paciente = new App\Usuario;

			$paciente->nombre = 'Valen';
			$paciente->email = 'valen.ayesa@gmail.com';
			$paciente->password = '123123'; // Ya no es necesario encriptar el password porque lo hacemos en el modelo.
			$paciente->role_id = '1';
			$paciente->telefono = '1234567';
			$paciente->save();

			//$paciente->nombre = 'Paciente2';
			//$paciente->email = 'paciente2@gmail.com';
			//$paciente->password = bcrypt('123123');
			//$paciente->role_id = '3';
			//$paciente->save();

			//$paciente->nombre = 'Mari';
			//$paciente->email = 'mari@gmail.com';
			//$paciente->password = bcrypt('123123');
			//$paciente->role = 'empleado';
			//$paciente->save();

		return $paciente;
	});

	Route::get('roles', function(){
		return \App\Role::with('user')->get();
	});

Route::get('datatable', 'DataTableController@index');

Route::get('/getdata', 'DataTableController@getPosts')->name('datatable.getdata');