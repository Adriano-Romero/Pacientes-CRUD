<?php

namespace App\Http\Controllers;

use App\Exame;
use App\Procedimento;
use App\User;
use Illuminate\Http\Request;
use Session;

class ExameController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$exames = Exame::orderBy('data', 'desc')->with('paciente', 'procedimento')->get();

		return view('exame.index', ['exames' => $exames]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$procedimentos = Procedimento::lists('nome', 'id');
		$pacientes = User::lists('nome', 'id');
		return view('exame.create', compact('procedimentos', 'pacientes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'data' => 'required',
			'paciente_id' => 'required',
			'procedimento_id' => 'required',
		]);

		$input = $request->all();
		Exame::create($input);

		Session::flash('flash_message', 'Exame criado com sucesso!');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$exame = Exame::with('paciente', 'procedimentos')->findOrFail($id);
		return view('exame.show', compact('exame'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$procedimentos = Procedimento::lists('nome', 'id');
		$pacientes = User::lists('nome', 'id');
		$exame = Exame::with('paciente', 'procedimento')->findOrFail($id);
		return view('exame.edit', compact('exame', 'procedimentos', 'pacientes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
