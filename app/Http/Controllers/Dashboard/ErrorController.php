<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
	public function error403()
	{
		return view('pages.dashboard.errors.403');
	}
}
