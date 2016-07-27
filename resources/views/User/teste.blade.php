@extends('layouts.app')

@section('title', ' Relatório de Exames')
@section('content')
	{{--	{{dd($resultados) }} --}}

<table id="example" class="table table-striped table-bordered">
	<thead>
		<tr>
		<th>Paciente</th>
		<th>Nome Paciente</th>
		<th>Dat exame</th>
		<th>Nome do procedimento</th>
		<th> Número exames</th>
		<th> Preço total</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($resultados as $result)
	<tr>
	    <td>	{{$result->pacid}} </td>
	    <td>    {{$result->pacnome}}</td>
	    <td>	{{$result->data}} </td>
	    <td>	{{$result->procnom}} </td>
	    <td>	{{$result->num_exames}} </td>
	    <td>	{{$result->total_procedimento}} </td>
	@endforeach
	</tr>
	</tbody>
</table>
@stop