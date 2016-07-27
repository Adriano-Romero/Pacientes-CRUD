@extends('layouts.app')

@section('title')
	Exames
@stop

@section('content')
<h1>Lista de Exames</h1>
@if (Auth::guest())
	<a href="{{ url('/exames/create') }}" class=" lead btn btn-default">Adicione um novo exame</a>
@endif
<br>
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

<table id="example" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Data</th>
			<th>Nome Procedimento</th>
			<th>Preço Procedimento</th>
			<th>Paciente</th>
			<td>Opções</td>
		</tr>
	</thead>
	<tbody>

	@foreach ($exames as $exame)
	<tr>
    <td> {{$exame->data}}</td>
    <td>{{$exame->procedimento->nome}}</td>
     <td>{{$exame->procedimento->preco}}</td>
    <td>{{$exame->paciente->nome}}</td>
    <td><a href="{{ route('exames.show', $exame->id) }}"
			class="btn btn-info">Visualizar Exame</a></td>
  </tr>
	@endforeach
	</tbody>
</table>


@stop