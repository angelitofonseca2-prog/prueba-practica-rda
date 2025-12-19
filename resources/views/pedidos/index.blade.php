@extends('layouts.app')

@section('titulo', 'Listado de Pedidos')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Pedidos</h1>
        <a href="{{ route('pedidos.create') }}" class="btn btn-primary">
            Nuevo Pedido
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th>Tipo de arreglo</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Fecha pedido</th>
                <th>Fecha entrega</th>
                <th>Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->tipo_arreglo }}</td>
                    <td>{{ $pedido->nombre_cliente }}</td>
                    <td>{{ $pedido->telefono }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                    <td>{{ $pedido->fecha_entrega->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge
                            @if($pedido->estado === 'pendiente') bg-warning
                            @elseif($pedido->estado === 'armando') bg-info
                            @else bg-success @endif">
                            {{ ucfirst($pedido->estado) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('pedidos.destroy', $pedido) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea eliminar este pedido?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        No existen pedidos registrados.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
