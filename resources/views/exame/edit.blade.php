@extends('layouts.app')

@section('content')

<h1>Edite o exame- </h1>
<p class="lead">Edite o Exame abaixo <a href="{{ route('exames.index') }}">
Voltar aos  exames.</a></p>

<hr>


@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif


{!! Form::model($exame, [
    'method' => 'PATCH',
    'route' => ['exames.update', $exame->id]
]) !!}



<div class="form-group">
    {!! Form::label('data', 'Data:', ['class' => 'control-label']) !!}
    {!! Form::text('data', null, ['class' => 'form-control']) !!}

</div>
@if (Auth::guest())
<div class="form-group{{ $errors->has('paciente') ? ' has-error' : '' }}">
    {!! Form::label('paciente_id', 'Selecione o paciente') !!}
    {!! Form::select('paciente_id', $pacientes, null, ['id' => 'paciente',
    'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('paciente') }}</small>
</div>
@else
<input id="paciente_id" name="paciente_id" type="hidden" value="{{Auth::id()}}">
@endif

<div class="form-group{{ $errors->has('procedimento') ? ' has-error' : '' }}">
    {!! Form::label('procedimento_id', 'Selecione o procedimento') !!}
    {!! Form::select('procedimento_id', $procedimentos, null, ['id' => 'procedimentos', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('procedimento') }}</small>
</div>



{!! Form::submit('Atualizar exame', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop