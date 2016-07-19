<?php

namespace App\Http\Controllers;

use App\Exame;
use Auth;

class UserController extends Controller {
	//
	//
	public function showProfile() {
		// $users = Auth::user()->with('exame')->get();
		$exames = Exame::where('paciente_id', Auth::id())->orderBy('data', 'desc')->
			with('procedimento')->get();
		return view('user.paciente', compact('exames'));
	}
}
