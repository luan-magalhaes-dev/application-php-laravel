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
				
				Route::resource('users', 'Dashboard\UserController');
				Route::get('unauthorized', 'Dashboard\ErrorController@error403')
					->name('errors.403');
			});
	});
