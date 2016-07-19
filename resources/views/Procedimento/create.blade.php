@extends('layouts.app')


@section('title', 'Crie um procedimento')
@section('content')


@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif




<h1>Adicionar um novo procedimento</h1>
<p class="lead">Adicione um novo procedimento abaixo.</p>
<hr>



{!! Form::open([
    'route' => 'procedimentos.store'
]) !!}

<div class="form-group">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('preco', 'Preço:', ['class' => 'control-label']) !!}
    {!! Form::text('preco', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Crie um novo procedimento', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop