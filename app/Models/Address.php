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
	
	public function customers()
	{
		return $this->hasMany(Customer::class);
	}
	
	public function suppliers()
	{
		return $this->hasMany(Supplier::class);
	}
}
