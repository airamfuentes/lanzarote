@extends('layout')
@section('title','Listado de Aulas')
@section('content')
<div class="table-responsive">
    <table class="table">
        <tr>
            <td>#</td>
            <td>Nombre</td>
            <td>Letra</td>
            <td>Número</td>
            <td>Planta</td>
        </tr>
        @foreach ($aulas as $aula)
        <tr>
            <td>
                <a href="/aula/{{ $aula->id }}" class="btn btn-primary">Ver</a>
                <a href="/aula/actualizar/{{ $aula->id }}" class="btn btn-warning">Editar</a>
                <a href="/aula/eliminar/{{ $aula->id }}" class="btn btn-danger">Borrar</a>
            </td>
            <td>{{ $aula->nombre }}</td>
            <td>{{ $LETRAS[$aula->letra] }}</td>
            <td>{{ $aula->numero }}</td>
            <td>{{ $aula->planta }}</td>
        </tr>
        @endforeach
    </table>
    {{ $aulas->links() }}
</div>
<a href="/aulas/nuevo" class="btn btn-success">Nueva Aula</a>
@endsection