<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class Doctor extends Model
{
	use HasUuid;
	
	protected $attributes = [
		'sex' => 'M',
	];
	protected $fillable = [
		'address_id',
		'number_home',
		'complement',
		'name',
		'email',
		'cellphone',
		'cpf',
		'birth',
		'sex',
		'crm',
	];
	protected $hidden = [
		'address_id',
	];
	
	public function address()
	{
		return $this->belongsTo(Address::class);
	}
}
