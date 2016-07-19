@extends('layouts.app')

@section('title')
	Área Geral - Lista de Procedimentos
@stop


@section('content')
<h1>Lista de Procedimentos</h1>
@if (Auth::guest())
	<a href="{{ url('/procedimentos/create') }}" class=" lead btn btn-default">Adicione um novo procedimento</a>
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
			<th>Procedimento</th>
			<th>id</th>
			<th>Preço</th>
			@if (Auth::guest())
				<th>Opções</th>
			@endif
		</tr>
	</thead>
	<tbody>

	@foreach ($procedimentos as $procedimento)
	<tr>
    <td> {{$procedimento->nome}}</td>
     <td>{{$procedimento->id}}</td>
    <td>{{$procedimento->preco}}</td>
    @if (Auth::guest())
		<td>
			<a href="{{ route('procedimentos.show', $procedimento->id) }}"
			class="btn btn-info">Visualizar procedimento</a>
	        <a href="{{ route('procedimentos.edit', $procedimento->id) }}"
	        class="btn btn-primary">Editar procedimento</a>
        </td>
	@endif
  </tr>
	@endforeach
	</tbody>
</table>


@stop