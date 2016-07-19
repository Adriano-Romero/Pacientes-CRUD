@extends('layouts.app')




@section('title', 'Lista de dicas')
@section('content')
<h2>Lista de Pacientes</h2>
<a href="{{ url('/pacientes/create') }}" class=" lead btn btn-default">Adicionar um novo paciente</a></li>
<hr>

<table id="example" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Paciente</th>
			<th>login</th>
			<th>Senha</th>
			<th> Opções</th>
		</tr>
	</thead>
	<tbody>

	@foreach ($pacientes as $paciente)
	<tr>
		<td> {{$paciente->nome}}</td>
		<td>{{$paciente->login}}</td>
		<td>{{$paciente->password}}</td>
		<td>
			<a href="{{ route('pacientes.show', $paciente->id) }}"
			class="btn btn-info">Visualizar paciente</a>
	        <a href="{{ route('pacientes.edit', $paciente->id) }}"
	        class="btn btn-primary">Editar paciente</a>
        </td>
	</tr>
	@endforeach
	</tbody>
</table>

@stop



