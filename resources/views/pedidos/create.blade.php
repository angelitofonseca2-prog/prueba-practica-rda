@extends('layouts.app')

@section('titulo', 'Registrar Pedido')

@section('contenido')
    <h1 class="h3 mb-3">Registrar Pedido</h1>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tipo de arreglo *</label>
            <select name="tipo_arreglo" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="Cumpleaños">Cumpleaños</option>
                <option value="Boda">Boda</option>
                <option value="Funeral">Funeral</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del cliente *</label>
            <input type="text" name="nombre_cliente" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text"
                   name="telefono"
                   class="form-control"
                   pattern="[0-9]{10}"
                   title="Ingrese un número de 10 dígitos"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Dirección de entrega *</label>
            <textarea name="direccion_entrega" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de entrega *</label>
            <input type="date"
                   name="fecha_entrega"
                   class="form-control"
                   min="{{ date('Y-m-d') }}"
                   required>
        </div>

        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>
@endsection
