<?php

namespace App\Http\Controllers;

use App\Exame;
use Auth;
use DB;

class UserController extends Controller {
	//
	//
	public function showProfile() {
		// $users = Auth::user()->with('exame')->get();
		$exames = Exame::where('paciente_id', Auth::id())->orderBy('data', 'desc')->
			with('procedimento')->get();
		return view('user.paciente', compact('exames'));
	}

	public function testeRaw() {

		//$resultados = DB::select('select pacientes.id, pacientes.nome, procedimentos.id, procedimentos.nome, procedimentos.preco from pacientes, procedimentos, exames where exames.paciente_id = pacientes.id and exames.procedimento_id = procedimentos.id');

		$resultados = DB::select('select pacientes.id as pacid, pacientes.nome as pacnome, procedimentos.id as procid, procedimentos.nome as procnom, exames.data,
		procedimentos.preco as procpreco, SUM(procedimentos.preco) total_procedimento, COUNT(exames.id) as num_exames
			FROM pacientes, procedimentos, exames
			WHERE exames.paciente_id = pacientes.id
			AND exames.procedimento_id = procedimentos.id
			GROUP BY pacientes.id, pacientes.nome, procedimentos.id, procedimentos.nome');

		return view('user.teste', compact('resultados'));
	}
}
