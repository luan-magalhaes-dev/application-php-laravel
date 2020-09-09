<?php

namespace App\Services;

interface AddressServiceInterface
{
	public function showPostcode();
	
	public function showByWhere($wheres);
	
	public function store();
	
	public function update($addressId);
}
