@extends('layouts.app')


@section('title', 'Visualizando exame')
@section('content')


<h1>Paciente: {{ $exame->paciente->nome }}</h1>
<p class="lead">Data: {{ $exame->data}}</p>
<p class="lead">Procedimento: {{$exame->procedimento->nome}}</p>
<hr>

<a href="{{ route('exames.index') }}" class="btn btn-info">Voltar para os  exames</a>
<a href="{{ route('exames.edit', $exame->id) }}" class="btn btn-primary">Editar  esse exame</a>

<div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['exames.destroy', $exame->id]
        ]) !!}
            {!! Form::submit('Apagar esse exame?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@stop