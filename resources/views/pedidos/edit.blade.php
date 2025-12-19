@extends('layouts.app')

@section('titulo', 'Editar Pedido')

@section('contenido')
    <h1 class="h3 mb-3">Editar Pedido</h1>

    <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tipo de arreglo *</label>
            <select name="tipo_arreglo" class="form-select" required>
                <option value="Cumpleaños" {{ $pedido->tipo_arreglo == 'Cumpleaños' ? 'selected' : '' }}>Cumpleaños</option>
                <option value="Boda" {{ $pedido->tipo_arreglo == 'Boda' ? 'selected' : '' }}>Boda</option>
                <option value="Funeral" {{ $pedido->tipo_arreglo == 'Funeral' ? 'selected' : '' }}>Funeral</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del cliente *</label>
            <input type="text" name="nombre_cliente" class="form-control" value="{{ $pedido->nombre_cliente }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text"
                   name="telefono"
                   class="form-control"
                   pattern="[0-9]{10}"
                   value="{{ $pedido->telefono }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Dirección de entrega *</label>
            <textarea name="direccion_entrega" class="form-control" rows="3" required>{{ $pedido->direccion_entrega }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de entrega *</label>
            <input type="date"
                   name="fecha_entrega"
                   class="form-control"
                   min="{{ date('Y-m-d') }}"
                   value="{{ $pedido->fecha_entrega->format('Y-m-d') }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="armando" {{ $pedido->estado == 'armando' ? 'selected' : '' }}>Armando</option>
                <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
            </select>
        </div>

        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>
    </form>
@endsection
