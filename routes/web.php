<?php

// use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
	return redirect('dashboard');
});

Route::prefix('dashboard')
	->name('dashboard.')
	->group(function ()
	{
		Auth::routes();
		
		Route::get('/logout', function ()
		{
			Auth::logout();
			return redirect('dashboard');
		});
		Route::middleware(['auth'])
			->group(function ()
			{
				Route::get('/', function ()
				{
					return redirect('dashboard');
				});
				Route::get('', 'Dashboard\DashboardController@index')
					->name('dashboard');
				
				Route::post('addresses/showByPostcode', 'Dashboard\AddressController@showByPostcode')
					->name('address.showByPostcode');
				
				Route::resource('usuarios', 'Dashboard\UserController', ['as' => 'users'])
					->names([
						'index'   => 'users.index',
						'create'  => 'users.create',
						'store'   => 'users.store',
						'edit'    => 'users.edit',
						'update'  => 'users.update',
						'destroy' => 'users.destroy',
					]);
				Route::resource('pacientes', 'Dashboard\PatientController', ['as' => 'patients'])
					->names([
						'index'   => 'patients.index',
						'create'  => 'patients.create',
						'store'   => 'patients.store',
						'edit'    => 'patients.edit',
						'update'  => 'patients.update',
						'destroy' => 'patients.destroy',
					]);
				Route::post('pacientes/filtrar', 'Dashboard\PatientController@filter')
					->name('patients.json');
				
				Route::resource('medicos', 'Dashboard\DoctorController', ['as' => 'doctors'])
					->names([
						'index'   => 'doctors.index',
						'create'  => 'doctors.create',
						'store'   => 'doctors.store',
						'edit'    => 'doctors.edit',
						'update'  => 'doctors.update',
						'destroy' => 'doctors.destroy',
					]);
				Route::post('medicos/filtrar', 'Dashboard\DoctorController@filter')
					->name('doctors.json');
				
				Route::resource('agendamentos', 'Dashboard\SchedulingController', ['as' => 'schedules'])
					->names([
						'index'   => 'schedules.index',
						'create'  => 'schedules.create',
						'store'   => 'schedules.store',
						'edit'    => 'schedules.edit',
						'update'  => 'schedules.update',
						'destroy' => 'schedules.destroy',
					]);
				Route::get('unauthorized', 'Dashboard\ErrorController@error403')
					->name('errors.403');
			});
	});
