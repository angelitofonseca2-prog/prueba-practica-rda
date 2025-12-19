<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Listado de pedidos
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('created_at', 'desc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Formulario crear
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Guardar pedido
     * Estado SIEMPRE inicia en pendiente
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_arreglo' => 'required|in:Cumpleaños,Boda,Funeral',
            'nombre_cliente' => 'required|max:100',
            'telefono' => 'required|digits:10',
            'direccion_entrega' => 'required',
            'fecha_entrega' => 'required|date|after_or_equal:today',
        ]);

        Pedido::create([
            'tipo_arreglo' => $request->tipo_arreglo,
            'nombre_cliente' => $request->nombre_cliente,
            'telefono' => $request->telefono,
            'direccion_entrega' => $request->direccion_entrega,
            'fecha_entrega' => $request->fecha_entrega,
            'estado' => 'pendiente',
        ]);

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido registrado correctamente.');
    }

    /**
     * Formulario editar
     */
    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    /**
     * Actualizar pedido
     */
    public function update(Request $request, Pedido $pedido)
    {
        // No permitir editar pedidos entregados
        if ($pedido->estado === 'entregado') {
            return redirect()
                ->route('pedidos.index')
                ->with('success', 'El pedido ya fue entregado y no puede modificarse.');
        }

        $request->validate([
            'tipo_arreglo' => 'required|in:Cumpleaños,Boda,Funeral',
            'nombre_cliente' => 'required|max:100',
            'telefono' => 'required|digits:10',
            'direccion_entrega' => 'required',
            'fecha_entrega' => 'required|date|after_or_equal:today',
            'estado' => 'required|in:pendiente,armando,entregado',
        ]);

        $pedido->update([
            'tipo_arreglo' => $request->tipo_arreglo,
            'nombre_cliente' => $request->nombre_cliente,
            'telefono' => $request->telefono,
            'direccion_entrega' => $request->direccion_entrega,
            'fecha_entrega' => $request->fecha_entrega,
            'estado' => $request->estado,
        ]);

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido actualizado correctamente.');
    }

    /**
     * Eliminar pedido
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()
            ->route('pedidos.index')
            ->with('success', 'Pedido eliminado correctamente.');
    }
}
