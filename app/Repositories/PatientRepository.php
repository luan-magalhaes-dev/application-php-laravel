<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Repositories\Common\BaseRepository;

class PatientRepository extends BaseRepository
{
	public function model()
	{
		return Patient::class;
	}
}