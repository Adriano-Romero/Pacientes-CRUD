@extends('layouts.app')

@section('title', "Perfil")

@section('content')
	<h1> Lista de seus exames, {{Auth::user()->nome}} </h1>

<a href="{{ url('/exames/create') }}" class=" lead btn btn-default">Adicione um novo exame</a>
<br>
<table id="example" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Data do Exame</th>
			<th>Procedimento</th>
			<th>Preço</th>
			<th>Opções</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($exames as $exame)
	<tr>
		<td> {{$exame->data}} </td>
		<td> {{$exame->procedimento->nome}} </td>
		<td> {{$exame->procedimento->preco}} </td>
		<td> <a href="{{ route('exames.edit', $exame->id) }}"
	        class="btn btn-primary">Editar exame</a></td>
	</tr>
	@endforeach
	</tbody>
</table>
@stop
