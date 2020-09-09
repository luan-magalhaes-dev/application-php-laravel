<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePatientRequest;
use App\Http\Requests\Dashboard\UpdatePatientRequest;
use App\Services\AddressService;
use App\Services\PatientService;

class PatientController extends Controller
{
	private $patientService, $addressService;
	
	public function __construct(
		PatientService $patientService,
		AddressService $addressService
	) {
		$this->patientService = $patientService;
		$this->addressService = $addressService;
	}
	
	public function index()
	{
		$patients = $this->patientService
			->index(15);
		
		return view('pages.dashboard.patients.index')
			->with(compact([
				'patients',
			]));
	}
	
	public function create()
	{
		$patient = null;
		return view('pages.dashboard.patients.create')
			->with(compact([
				'patient',
			]));
	}
	
	public function store(StorePatientRequest $request)
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
		$this->patientService
			->store();
		
		$this->patientService
			->flashSuccessStore();
		
		return redirect()->route('dashboard.patients.index');
	}
	
	public function edit($uuid)
	{
		$patient = $this->patientService
			->show($uuid);
		
		if (!$patient) {
			$this->patientService
				->flashNotFound();
			return redirect()->route('dashboard.patients.index');
		}
		return view('pages.dashboard.patients.edit')
			->with(compact([
				'patient',
			]));
	}
	
	public function update(UpdatePatientRequest $request, $uuid)
	{
		$request->validated();
		$patient = $this->patientService
			->show($uuid);
		
		if (!$patient) {
			$this->patientService
				->flashNotFound();
			return redirect()->route('dashboard.patients.index');
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
		$this->patientService->update($uuid);
		
		$this->patientService->flashSuccessUpdate();
		return redirect()->route('dashboard.patients.index');
	}
	
	public function destroy($uuid)
	{
		!$this->patientService
			->destroy($uuid)
			?
			$this->patientService
				->flashNotFound()
			:
			$this->patientService
				->flashSuccessDestroy();
		
		return redirect()->route('dashboard.patients.index');
	}
}
