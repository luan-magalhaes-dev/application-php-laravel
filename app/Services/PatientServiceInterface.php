<?php

namespace App\Services;

interface PatientServiceInterface
{
	public function index();
	
	public function store();
	
	public function show($uuid);
	
	public function update($uuid);
	
	public function destroy($uuid);
	
	public function filter();
	
	public function flashNotFound();
	
	public function flashSuccessStore();
	
	public function flashSuccessUpdate();
	
	public function flashSuccessDestroy();
}
