<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreDoctorRequest;
use App\Http\Requests\Dashboard\UpdateDoctorRequest;
use App\Services\AddressService;
use App\Services\DoctorService;

class DoctorController extends Controller
{
	private $doctorService, $addressService;
	
	public function __construct(
		DoctorService $doctorService,
		AddressService $addressService
	) {
		$this->doctorService = $doctorService;
		$this->addressService = $addressService;
	}
	
	public function index()
	{
		$doctors = $this->doctorService
			->index(15);
		
		return view('pages.dashboard.doctors.index')
			->with(compact([
				'doctors',
			]));
	}
	
	public function create()
	{
		$doctor = null;
		return view('pages.dashboard.doctors.create')
			->with(compact([
				'doctor',
			]));
	}
	
	public function store(StoreDoctorRequest $request)
	{
		$request->validated();
		
		$address = $this->addressService
			->showByStreet(
				preg_replace('/\D/', '', request('postcode')),
				strtoupper(request('street')),
				strtoupper(request('neighborhood'))
			);
		if (!$address) {
			$address = $this->addressService->store();
		}
		request()->merge([
			'address_id' => $address->id,
		]);
		$this->doctorService
			->store();
		
		$this->doctorService
			->flashSuccessStore();
		
		return redirect()->route('dashboard.doctors.index');
	}
	
	public function edit($uuid)
	{
		$doctor = $this->doctorService
			->show($uuid);
		
		if (!$doctor) {
			$this->doctorService
				->flashNotFound();
			return redirect()->route('dashboard.doctors.index');
		}
		return view('pages.dashboard.doctors.edit')
			->with(compact([
				'doctor',
			]));
	}
	
	public function update(UpdateDoctorRequest $request, $uuid)
	{
		$request->validated();
		$doctor = $this->doctorService
			->show($uuid);
		
		if (!$doctor) {
			$this->doctorService
				->flashNotFound();
			return redirect()->route('dashboard.doctors.index');
		}
		$address = $this->addressService
			->showByStreet(
				preg_replace('/\D/', '', request('postcode')),
				strtoupper(request('street')),
				strtoupper(request('neighborhood'))
			);
		if (!$address) {
			$address = $this->addressService->store();
		}
		request()->merge([
			'address_id' => $address->id,
		]);
		$this->doctorService->update($uuid);
		
		$this->doctorService->flashSuccessUpdate();
		return redirect()->route('dashboard.doctors.index');
	}
	
	public function destroy($uuid)
	{
		!$this->doctorService
			->destroy($uuid)
			?
			$this->doctorService
				->flashNotFound()
			:
			$this->doctorService
				->flashSuccessDestroy();
		
		return redirect()->route('dashboard.doctors.index');
	}
}
