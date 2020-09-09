<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreUserRequest;
use App\Http\Requests\Dashboard\UpdateUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
	private $userService;
	
	public function __construct(
		UserService $userService
	) {
		$this->userService = $userService;
	}
	
	public function index()
	{
		$users = $this->userService
			->index();
		return view('pages.dashboard.users.index')
			->with(compact([
				'users',
			]));
	}
	
	public function create()
	{
		$user = null;
		return view('pages.dashboard.users.create')
			->with(compact([
				'user',
			]));
	}
	
	public function store(
		StoreUserRequest $request
	) {
		$request->validated();
		
		$this->userService
			->store();
		
		$this->userService
			->flashSuccessStore();
		
		return redirect()->route('dashboard.users.index');
	}
	
	public function edit(
		$uuid
	) {
		$user = $this->userService
			->show($uuid);
		
		if (!$user) {
			$this->userService
				->flashNotFound();
			return redirect()->route('dashboard.users.index');
		}
		return view('pages.dashboard.users.edit')
			->with(compact([
				'user',
			]));
	}
	
	public function update(
		UpdateUserRequest $request, $uuid
	) {
		$request->validated();
		
		$user = $this->userService
			->update($uuid);
		
		if (!$user) {
			$this->userService
				->flashNotFound();
			return redirect()->route('dashboard.users.index');
		}
		$this->userService
			->flashSuccessUpdate();
		return redirect()->route('dashboard.users.index');
	}
	
	public function destroy(
		$uuid
	) {
		!$this->userService
			->destroy($uuid)
			?
			$this->userService
				->flashNotFound()
			:
			$this->userService->flashSuccessDestroy();
		
		return redirect()->route('dashboard.users.index');
	}
}
