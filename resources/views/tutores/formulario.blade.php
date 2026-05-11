@extends('layout')
@section('title','Tutor')
@section('content')
@php
    $disabled = '';
    $boton = '<button type="submit" class="btn btn-primary">Guardar</button>';
    if ($oper == 'cons' || $oper == 'supr') {
        $disabled = 'disabled';
        $boton = ($oper == 'supr') ? '<button type="submit" class="btn btn-danger">Eliminar</button>' : '';
    }
@endphp
<br>
@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif
<form action="{{ route('tutores.almacenar') }}" method="POST">
    @csrf
    <input type="hidden" name="oper" value="{{ $oper }}">
    <input type="hidden" name="id" value="{{ $tutor->id }}">
    <div class="mb-3">
        <label>Nombre</label>
        <input {{ $disabled }} type="text" name="nombre" class="form-control"
               value="{{ old('nombre',$tutor->nombre) }}">
        @error('nombre') <p style="color:red">{{ $message }}</p> @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input {{ $disabled }} type="email" name="email" class="form-control"
               value="{{ old('email',$tutor->email) }}">
        @error('email') <p style="color:red">{{ $message }}</p> @enderror
    </div>
    <div class="mb-3">
        <label>Antigüedad (año de inicio)</label><br>
        {!! $radio->render() !!}
        @error('antiguedad') <p style="color:red">{{ $message }}</p> @enderror
    </div>
    @php echo $boton; @endphp
</form>
@endsection