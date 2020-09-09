<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Address extends Model
{
	use HasUuid;
	
	protected $fillable = [
		'street',
		'neighborhood',
		'city',
		'uf',
		'postcode',
	];
	
	public function patients()
	{
		return $this->hasMany(Patient::class);
	}
	
	public function doctors()
	{
		return $this->hasMany(Doctor::class);
	}
}
