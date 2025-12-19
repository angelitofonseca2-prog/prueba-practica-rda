# Examen Práctico – Desarrollo en Plataformas  
## CASO 12 – Florería “Flores del Valle”

### Descripción del caso
La florería **Flores del Valle**, administrada por Doña Rosa, requiere un sistema sencillo para registrar y gestionar pedidos de arreglos florales para **cumpleaños, bodas y funerales**.  
El sistema reemplaza el registro manual en cuaderno y permite evitar olvidos, mantener un historial de pedidos y consultar la información desde dispositivos móviles.

---

## Funcionalidades implementadas
- Registro de pedidos con los siguientes datos:
  - Tipo de arreglo (Cumpleaños, Boda, Funeral)
  - Nombre del cliente
  - Teléfono
  - Dirección de entrega
  - Fecha de entrega
- Asignación automática de la **fecha de pedido** (campo `created_at`)
- Gestión del estado del pedido:
  - Pendiente
  - Armando
  - Entregado
- Listado de pedidos ordenados por fecha de creación
- Edición de pedidos existentes
- Cancelación de pedidos (eliminación controlada)
- Interfaz responsive accesible desde dispositivos móviles

---

## Decisiones de diseño

### Estado del pedido
- Al **crear un pedido**, el estado se asigna automáticamente como **pendiente**.
- El usuario **no puede seleccionar el estado** al momento de la creación.
- El estado puede modificarse únicamente al **editar** el pedido.
- Cuando un pedido se marca como **entregado**, se considera finalizado:
  - No puede ser editado
  - No puede ser cancelado

### Cancelación de pedidos
- Un pedido puede ser cancelado únicamente si su estado es **pendiente** o **armando**.
- Los pedidos **entregados no se eliminan**, con el fin de conservar el historial.

### Validaciones
- **Todos los campos son obligatorios**.
- El número de teléfono debe contener **exactamente 10 dígitos numéricos**.
- La fecha de entrega **no puede ser anterior a la fecha actual**.
- Las validaciones se aplican tanto en backend como en frontend.

---

## Modelo de datos
Tabla `pedidos`:
- id
- tipo_arreglo
- nombre_cliente
- telefono
- direccion_entrega
- fecha_entrega
- estado
- created_at
- updated_at

---

## Tecnologías utilizadas
- Laravel
- Blade
- Bootstrap 5
- PHP
- MySQL

---

## Rutas
Se utiliza el controlador de recursos de Laravel:

```php
Route::resource('pedidos', PedidoController::class);
