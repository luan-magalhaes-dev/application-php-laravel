<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
	private $optionRepository, $optionValueRepository;
	
	public function __construct(\App\Repositories\OptionRepository $optionRepository, \App\Repositories\OptionValueRepository $optionValueRepository)
	{
		$this->optionRepository = $optionRepository;
		$this->optionValueRepository = $optionValueRepository;
	}
	
	/**
	 * Run the database seeds.
	 * @return void
	 */
	public function run()
	{
		$options = [
			[
				'name'   => 'Tamanhos',
				'type'   => 'select',
				'status' => true,
			],
		];
		foreach ($options as $option) {
			$option = $this->optionRepository->create($option);
			for ($i = 33; $i <= 50; $i++) {
				$this->optionValueRepository->create([
					'option_id' => $option->id,
					'name'      => $i,
				]);
				sleep(1);
			}
		}
	}
}
