<?php

use Illuminate\Support\Facades\Route;

if (isset($_SERVER['HTTP_ORIGIN'])) {
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: content-type, cache-control, postman-token, Authorization, X-Requested-With');
	header('Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE');
	header('X-Powered-By: Luan Magalhães Pereira');
	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		header('Content-Type: application/json');
		header('HTTP/1.1 204 OK');
		exit();
	}
}
Route::group(['prefix' => 'v1'], function ()
{
	Route::get('', function ()
	{
		return response()->json([
			'content' => date('c'),
			'author'  => 'Luan Magalhães Pereira',
			'Message' => 'TESTE MAZZAFC.TECH',
		]);
	});
	Route::get('ping', function ()
	{
		return response()->json([
			'content' => date('c'),
			'author'  => 'Luan Magalhães Pereira',
			'Message' => 'TESTE MAZZAFC.TECH',
		]);
	});
	
	Route::group(['prefix' => 'users'], function ()
	{
		Route::post('token', 'Api\v1\User\TokenController@token')
			->name('v1.users.token');
	});
	Route::middleware('auth:api')
		->group(function ()
		{
			Route::group(['prefix' => 'doctors'], function ()
			{
				Route::get('', 'Api\v1\Doctor\DoctorController@index')
					->name('v1.doctors.index');
			});
		});
	
});