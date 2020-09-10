<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreSchedulingRequest;
use App\Http\Requests\Dashboard\UpdateSchedulingRequest;
use App\Services\SchedulingService;

class SchedulingController extends Controller
{
	private $schedulingService;
	
	public function __construct(
		SchedulingService $schedulingService
	) {
		$this->schedulingService = $schedulingService;
	}
	
	public function index()
	{
		$schedules = $this->schedulingService
			->index();
		return view('pages.dashboard.schedules.index')
			->with(compact([
				'schedules',
			]));
	}
	
	public function create()
	{
		$scheduling = null;
		return view('pages.dashboard.schedules.create')
			->with(compact([
				'scheduling',
			]));
	}
	
	public function store(StoreSchedulingRequest $request)
	{
		$request->validated();
		
		$this->schedulingService
			->store();
		
		$this->schedulingService
			->flashSuccessStore();
		
		return redirect()->route('dashboard.schedules.index');
	}
	
	public function edit($uuid)
	{
		$scheduling = $this->schedulingService
			->show($uuid);
		
		if (!$scheduling) {
			$this->schedulingService
				->flashNotFound();
			return redirect()->route('dashboard.schedules.index');
		}
		return view('pages.dashboard.schedules.edit')
			->with(compact([
				'scheduling',
			]));
	}
	
	public function update(UpdateSchedulingRequest $request, $uuid)
	{
		$request->validated();
		
		$scheduling = $this->schedulingService
			->update($uuid);
		
		if (!$scheduling) {
			$this->schedulingService
				->flashNotFound();
			return redirect()->route('dashboard.schedules.index');
		}
		$this->schedulingService
			->flashSuccessUpdate();
		return redirect()->route('dashboard.schedules.index');
	}
	
	public function destroy($uuid)
	{
		!$this->schedulingService
			->destroy($uuid)
			?
			$this->schedulingService
				->flashNotFound()
			:
			$this->schedulingService->flashSuccessDestroy();
		
		return redirect()->route('dashboard.schedules.index');
	}
}
