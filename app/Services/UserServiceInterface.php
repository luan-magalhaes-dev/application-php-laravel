<?php

namespace App\Services;

interface UserServiceInterface
{
	public function index($paginate);
	
	public function store();
	
	public function show($uuid);
	
	public function update($uuid);
	
	public function destroy($uuid);
	
	public function flashNotFound();
	
	public function flashSuccessStore();
	
	public function flashSuccessUpdate();
	
	public function flashSuccessDestroy();
}
