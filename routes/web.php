<?php

// use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
	return redirect('dashboard/home');
});

Route::prefix('dashboard')
	->name('dashboard.')
	->group(function ()
	{
		Auth::routes();
		
		Route::get('/logout', function ()
		{
			Auth::logout();
			return redirect('dashboard/home');
		});
		Route::middleware(['auth'])
			->group(function ()
			{
				Route::get('/', function ()
				{
					return redirect('dashboard/home');
				});
				Route::get('home', 'Dashboard\DashboardController@index')
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
				Route::resource('medicos', 'Dashboard\DoctorController', ['as' => 'doctors'])
					->names([
						'index'   => 'doctors.index',
						'create'  => 'doctors.create',
						'store'   => 'doctors.store',
						'edit'    => 'doctors.edit',
						'update'  => 'doctors.update',
						'destroy' => 'doctors.destroy',
					]);
				Route::get('unauthorized', 'Dashboard\ErrorController@error403')
					->name('errors.403');
			});
	});
