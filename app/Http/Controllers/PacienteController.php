<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;

class PacienteController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$pacientes = User::orderBy('nome', 'asc')->get();
		return view('pacientes.index', ['pacientes' => $pacientes]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('pacientes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'nome' => 'required',
			'login' => 'required|unique:pacientes',
			'password' => 'required|min:4|confirmed',
			'password_confirmation' => 'required|min:4',
		]);

		$input = $request->all();
		User::create($input);

		Session::flash('flash_message', 'Paciente criado com sucesso!');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$paciente = User::findOrFail($id);
		return view('pacientes.show', compact('paciente'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$paciente = User::findOrFail($id);
		return view('pacientes.edit', compact('paciente'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$paciente = User::findOrFail($id);

		$this->validate($request, [
			'nome' => 'required',
			'login' => 'required|unique:pacientes',
			'password' => 'required|min:4|confirmed',
			'password_confirmation' => 'required|min:4',
		]);

		$input = $request->all();

		$paciente->fill($input)->save();

		Session::flash('flash_message', 'Paciente atualizado!');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Paciente::destroy($id);

		Session::flash('flash_message', 'paciente apagado com sucesso!');

		return redirect()->route('pacientes.index');
	}
}
