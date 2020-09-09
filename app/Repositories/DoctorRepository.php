<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Repositories\Common\BaseRepository;

class DoctorRepository extends BaseRepository
{
	public function model()
	{
		return Doctor::class;
	}
}