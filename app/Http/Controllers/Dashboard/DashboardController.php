<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Show the application dashboard.
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('pages.dashboard.index');
	}
}
