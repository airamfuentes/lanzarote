@extends('layout')
@section('title','Listado de Tutores')
@section('content')
<div class="table-responsive">
    <table class="table">
        <tr>
            <td>#</td>
            <td>Nombre</td>
            <td>Email</td>
            <td>Antigüedad</td>
            <td>Horario</td>
        </tr>
        @foreach ($tutores as $tutor)
        <tr>
            <td>
                <a href="/tutor/{{ $tutor->id }}" class="btn btn-primary">Ver</a>
                <a href="/tutor/actualizar/{{ $tutor->id }}" class="btn btn-warning">Editar</a>
                <a href="/tutor/eliminar/{{ $tutor->id }}" class="btn btn-danger">Borrar</a>
            </td>
            <td>{{ $tutor->nombre }}</td>
            <td>{{ $tutor->email }}</td>
            <td>{{ $tutor->antiguedad }}</td>
            <td>
                <a href="/tutor/{{ $tutor->id }}/horario" class="btn btn-info">Horario</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $tutores->links() }}
</div>
<a href="/tutores/nuevo" class="btn btn-success">Nuevo Tutor</a>
@endsection