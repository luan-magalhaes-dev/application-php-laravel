<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function (Blueprint $table)
		{
			$table->id();
			$table->uuid('uuid');
			$table->bigInteger('address_id')
				->unsigned()
				->nullable();
			$table->foreign('address_id')
				->references('id')
				->on('addresses')
				->onDelete('set null')
				->onUpdate('set null');
			$table->string('number_home')
				->nullable();
			$table->string('complement')
				->nullable();
			$table->string('name');
			$table->string('email')
				->nullable();
			$table->string('cellphone', 12)
				->nullable();
			$table->string('cpf', 11);
			$table->date('birth')
				->nullable();
			$table->enum('sex', [
				'M',
				'F',
			])
				->default('M');
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('patients');
	}
}
