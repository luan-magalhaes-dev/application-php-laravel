<?php

namespace App\Services;

use App\Repositories\DoctorRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DoctorService implements DoctorServiceInterface
{
	private $doctorRepository;
	
	public function __construct(
		DoctorRepository $doctorRepository
	) {
		$this->doctorRepository = $doctorRepository;
	}
	
	public function index($paginate)
	{
		$doctors = $this->doctorRepository
			->orderBy('id', 'DESC')
			->paginate($paginate);
		
		if (!count($doctors)) {
			return false;
		}
		return $doctors;
	}
	
	public function store()
	{
		return $this->doctorRepository->create($this->values());
	}
	
	public function show($uuid)
	{
		try {
			return $this->doctorRepository
				->where('uuid', $uuid)
				->first();
		} catch (ModelNotFoundException $e) {
			return false;
		}
	}
	
	public function update($uuid)
	{
		$doctor = $this->show($uuid);
		
		if (!$doctor) {
			return false;
		}
		$this->doctorRepository
			->updateById($doctor->id, $this->values());
		
		return $doctor;
	}
	
	public function destroy($uuid)
	{
		$doctor = $this->show($uuid);
		
		if (!$doctor) {
			return false;
		}
		return $this->doctorRepository
			->deleteById($doctor->id);
	}
	
	private function values()
	{
		$values = [
			'name'  => request('name'),
			'email' => request('email'),
			'sex'   => request('sex'),
			'cpf'   => preg_replace('/\D/', '', request('cpf')),
			'crm'   => request('crm'),
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
			'value' => trans('system.doctor'),
		]))
			->error()
			->important();
	}
	
	public function flashSuccessStore()
	{
		return flash(trans('system.store_success_m', [
			'value' => trans('system.doctor'),
		]))->success();
	}
	
	public function flashSuccessUpdate()
	{
		return flash(trans('system.update_success_m', [
			'value' => trans('system.doctor'),
		]))
			->success()
			->important();
	}
	
	public function flashSuccessDestroy()
	{
		return flash(trans('system.destroy_success_m', [
			'value' => trans('system.doctor'),
		]))
			->success()
			->important();
	}
}
