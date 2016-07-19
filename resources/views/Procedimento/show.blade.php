@extends('layouts.app')


@section('title', 'Visualizando procedimento')
@section('content')


<h1>Nome: {{ $procedimento->nome }}</h1>
<p class="lead">Preço: {{ $procedimento->preco }}</p>
<hr>

<a href="{{ route('procedimentos.index') }}" class="btn btn-info">Volta para os   procedimentos</a>
<a href="{{ route('procedimentos.edit', $procedimento->id) }}" class="btn btn-primary">Editar procedimento</a>


<div class="col-md-6 text-right">
        {{ Form::open([
            'method' => 'DELETE',
            'route' => ['procedimentos.destroy', $procedimento->id]
        ]) }}
            {!! Form::submit('Apagar essa procedimento?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
 </div>




@stop