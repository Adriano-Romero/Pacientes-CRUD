@extends('layouts.app')

@section('content')

<h1>Edite o procedimento - {{ $procedimento->nome }} </h1>
<p class="lead">Edite o procedimento abaixo <a href="{{ route('procedimentos.index') }}">Voltar aos  procedimentos.</a></p>

Preço: {{$procedimento->preco}}
<hr>


@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif


{!! Form::model($procedimento, [
    'method' => 'PATCH',
    'route' => ['procedimentos.update', $procedimento->id]
]) !!}


<div class="form-group">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('preco', 'Preço:', ['class' => 'control-label']) !!}
    {!! Form::text('preco', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Atualizr procedimento', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop