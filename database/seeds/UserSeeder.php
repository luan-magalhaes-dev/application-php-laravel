<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();
		DB::table('users')
			->truncate();
		Schema::enableForeignKeyConstraints();
		
		\App\Models\User::create(
			[
				'name'     => 'Luan Magalhães',
				'email'    => 'mp.luan@gmail.com',
				'password' => bcrypt('123456'),
			]);
		\App\Models\User::create([
			'name'     => 'Willyan Luindayk',
			'email'    => 'willyanluindayk@gmail.com',
			'password' => bcrypt('123456'),
		]);
	}
}
