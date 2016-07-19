@extends('layouts.app')


@section('title', 'Crie um novo paciente')
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




<h1>Adicionar um novo paciente</h1>
<p class="lead">Adicione um novo paciente.</p>
<hr>



{!! Form::open([
    'route' => 'pacientes.store'
]) !!}

<div class="form-group">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">
    {!! Form::label('login', 'Login:', ['class' => 'control-label']) !!}
    {!! Form::text('login', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Senha') !!}
    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('password') }}</small>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    {!! Form::label('password_confirmation', 'Confirme a senha', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-9">
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
    </div>
</div>

{!! Form::submit('Crie um novo paciente', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop