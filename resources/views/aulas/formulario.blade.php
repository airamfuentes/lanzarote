@extends('layout')
@section('title','Aula')
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
<form action="{{ route('aulas.almacenar') }}" method="POST">
    @csrf
    <input type="hidden" name="oper" value="{{ $oper }}">
    <input type="hidden" name="id" value="{{ $aula->id }}">
    <div class="mb-3">
        <label>Nombre del aula</label>
        <input {{ $disabled }} type="text" name="nombre" class="form-control"
               value="{{ old('nombre',$aula->nombre) }}">
        @error('nombre') <p style="color:red">{{ $message }}</p> @enderror
    </div>
    <div class="mb-3">
        <label>Letra del aula</label>
        <select {{ $disabled }} name="letra" class="form-select">
            <option value="">Selecciona...</option>
            @foreach ($LETRAS as $k => $v)
                <option value="{{ $k }}" {{ old('letra',$aula->letra)==$k ? 'selected':'' }}>
                    [{{ $k }}] {{ $v }}
                </option>
            @endforeach
        </select>
        @error('letra') <p style="color:red">{{ $message }}</p> @enderror
    </div>
    <div class="mb-3">
        <label>Número del aula</label>
        <input {{ $disabled }} type="number" name="numero" class="form-control"
               value="{{ old('numero',$aula->numero) }}">
        @error('numero') <p style="color:red">{{ $message }}</p> @enderror
    </div>
    <div class="mb-3">
        <label>Planta</label>
        <select {{ $disabled }} name="planta" class="form-select">
            <option value="">Selecciona...</option>
            @foreach ($PLANTAS as $k => $v)
                <option value="{{ $k }}" {{ old('planta',$aula->planta)==$k ? 'selected':'' }}>
                    {{ $v }}
                </option>
            @endforeach
        </select>
        @error('planta') <p style="color:red">{{ $message }}</p> @enderror
    </div>
    @php echo $boton; @endphp
</form>
@endsection