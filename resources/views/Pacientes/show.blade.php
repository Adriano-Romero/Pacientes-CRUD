@extends('layouts.app')


@section('title', 'Visualizando paciente')
@section('content')


<h1>{{ $paciente->nome }}</h1>
<p class="lead">Login: {{ $paciente->login }}</p>
<p class="lead">Senha: {{ $paciente->password }}</p>
<hr>

<a href="{{ route('pacientes.index') }}" class="btn btn-info">Volta para os  pacientes</a>
<a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar  esse paciente</a>

<div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['pacientes.destroy', $paciente->id]
        ]) !!}
            {!! Form::submit('Apagar esse paciente?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@stop