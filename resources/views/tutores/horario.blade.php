@extends('layout')
@section('title','Horario')
@section('content')
<h2>Módulos de {{ $tutor->nombre }}</h2>
<ul>
    @forelse ($cursos as $curso)
        <li>{{ $curso->nombre }}</li>
    @empty
        <li>Sin módulos asignados</li>
    @endforelse
</ul>
<a href="/tutores" class="btn btn-secondary">Volver</a>
@endsection