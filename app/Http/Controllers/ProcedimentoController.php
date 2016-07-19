<?php

namespace App\Http\Controllers;

use App\Procedimento;
use Illuminate\Http\Request;
use Session;

class ProcedimentoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$procedimentos = Procedimento::orderBy('nome', 'asc')->get();

		return view('procedimento.index', ['procedimentos' => $procedimentos]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('procedimento.create');
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
			'preco' => 'required',
		]);

		$input = $request->all();
		Procedimento::create($input);

		Session::flash('flash_message', 'Procedimento criado com sucesso!');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$procedimento = Procedimento::findOrFail($id);
		return view('procedimento.show', compact('procedimento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$procedimento = Procedimento::findOrFail($id);
		return view('procedimento.edit', compact('procedimento'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$procedimento = Procedimento::findOrFail($id);

		$this->validate($request, [
			'nome' => 'required',
			'preco' => 'required',
		]);

		$input = $request->all();

		$procedimento->fill($input)->save();

		Session::flash('flash_message', 'procedimento atualizado!');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//$procedimento = Procedimento::findOrFail($id);

		//$procedimento->delete();
		Procedimento::destroy($id);

		Session::flash('flash_message', 'procedimento apagado com sucesso!');

		return redirect()->route('procedimentos.index');
	}
}
