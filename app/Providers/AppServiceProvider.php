<?php

namespace App\Providers;

use App\Services\AddressService;
use App\Services\AddressServiceInterface;
use App\Services\DoctorService;
use App\Services\DoctorServiceInterface;
use App\Services\PatientService;
use App\Services\PatientServiceInterface;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 * @return void
	 */
	public function register()
	{
		//
	}
	
	/**
	 * Bootstrap any application services.
	 * @return void
	 */
	public function boot()
	{
		$this->app->bind(AddressServiceInterface::class, AddressService::class);
		$this->app->bind(DoctorServiceInterface::class, DoctorService::class);
		$this->app->bind(PatientServiceInterface::class, PatientService::class);
		$this->app->bind(UserServiceInterface::class, UserService::class);
	}
}
