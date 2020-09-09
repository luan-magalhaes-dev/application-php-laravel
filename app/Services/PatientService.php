<?php

namespace App\Services;

use App\Repositories\PatientRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientService implements PatientServiceInterface
{
	private $patientRepository;
	
	public function __construct(
		PatientRepository $patientRepository
	) {
		$this->patientRepository = $patientRepository;
	}
	
	public function index()
	{
		$patients = $this->patientRepository
			->orderBy('id', 'DESC')
			->get();
		
		if (!count($patients)) {
			return false;
		}
		return $patients;
	}
	
	public function store()
	{
		return $this->patientRepository->create($this->values());
	}
	
	public function show($uuid)
	{
		try {
			return $this->patientRepository
				->where('uuid', $uuid)
				->first();
		} catch (ModelNotFoundException $e) {
			return false;
		}
	}
	
	public function update($uuid)
	{
		$patient = $this->show($uuid);
		
		if (!$patient) {
			return false;
		}
		$this->patientRepository
			->updateById($patient->id, $this->values());
		
		return $patient;
	}
	
	public function destroy($uuid)
	{
		$patient = $this->show($uuid);
		
		if (!$patient) {
			return false;
		}
		return $this->patientRepository
			->deleteById($patient->id);
	}
	
	private function values()
	{
		$values = [
			'name'  => request('name'),
			'email' => request('email'),
			'sex'   => request('sex'),
			'cpf'   => preg_replace('/\D/', '', request('cpf')),
		];
		if (!is_null(request('cellphone'))) {
			$values['cellphone'] = preg_replace('/\D/', '', request('cellphone'));
		}
		if (!is_null(request('address_id'))) {
			$values['address_id'] = request('address_id');
		}
		if (!is_null(request('birth'))) {
			$values['birth'] = request('birth');
		}
		if (!is_null(request('number_home'))) {
			$values['number_home'] = request('number_home');
		}
		if (!is_null(request('complement'))) {
			$values['complement'] = request('complement');
		}
		return $values;
	}
	
	public function flashNotFound()
	{
		return flash(trans('system.not_found_m', [
			'value' => trans('system.patient'),
		]))
			->error()
			->important();
	}
	
	public function flashSuccessStore()
	{
		return flash(trans('system.store_success_m', [
			'value' => trans('system.patient'),
		]))->success();
	}
	
	public function flashSuccessUpdate()
	{
		return flash(trans('system.update_success_m', [
			'value' => trans('system.patient'),
		]))
			->success()
			->important();
	}
	
	public function flashSuccessDestroy()
	{
		return flash(trans('system.destroy_success_m', [
			'value' => trans('system.patient'),
		]))
			->success()
			->important();
	}
}
