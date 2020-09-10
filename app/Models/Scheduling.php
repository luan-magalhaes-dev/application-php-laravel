<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Scheduling extends Model
{
	use HasUuid;
	
	protected $table = 'schedules';
	
	protected $fillable = [
		'doctor_id',
		'patient_id',
		'schedule',
	];
	protected $hidden = [
		'doctor_id',
		'patient_id',
	];
	
	public function doctor()
	{
		return $this->belongsTo(Doctor::class);
	}
	
	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
}
