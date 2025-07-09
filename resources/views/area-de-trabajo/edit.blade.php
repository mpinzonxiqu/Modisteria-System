<!-- resources/views/area-de-trabajo/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Área de Trabajo</h1>

    <form action="{{ route('area-de-trabajo.update', $areaDeTrabajo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $areaDeTrabajo->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $areaDeTrabajo->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
@endsection
                  





