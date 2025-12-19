# Examen Práctico – Desarrollo en Plataformas  
## CASO 12 – Florería “Flores del Valle”

---

## Descripción del caso
La florería **Flores del Valle**, administrada por Doña Rosa, necesitaba un sistema que permita registrar y gestionar pedidos de arreglos florales para **cumpleaños, bodas y funerales**, reemplazando el registro manual en cuaderno.  
El sistema evita olvidos, mantiene un historial de pedidos y permite consultar la información desde dispositivos móviles.

---

## Funcionalidades
- ✅ Crear pedido (formulario)
- ✅ Listar pedidos (tabla)
- ✅ Editar pedido (formulario prellenado)
- ✅ Cancelar pedido (eliminación controlada)
- ✅ Gestión de estados: pendiente, armando, entregado
- ✅ Interfaz responsive (Bootstrap, probado en vista móvil)

---

## Decisiones de diseño

### Estado del pedido
- Al **crear un pedido**, el estado se asigna automáticamente como **pendiente**.
- El usuario **no puede seleccionar el estado** al momento de la creación.
- El estado solo puede modificarse al **editar** el pedido.
- Un pedido en estado **entregado** se considera finalizado:
  - No puede ser editado
  - No puede ser cancelado

### Cancelación de pedidos
- Los pedidos pueden cancelarse únicamente si se encuentran en estado **pendiente** o **armando**.
- Los pedidos entregados se conservan como **historial**.

### Validaciones
- Todos los campos son obligatorios.
- El número de teléfono debe contener **exactamente 10 dígitos numéricos**.
- La fecha de entrega **no puede ser anterior a la fecha actual**.
- Las validaciones se aplican tanto en backend como en frontend.

---

## Base de datos

### Tabla: `pedidos`

| Campo               | Tipo                                |
|---------------------|-------------------------------------|
| id                  | bigint (PK, autoincrement)          |
| tipo_arreglo        | varchar(100)                        |
| nombre_cliente      | varchar(100)                        |
| telefono            | varchar(20)                         |
| direccion_entrega   | text                                |
| fecha_entrega       | date                                |
| estado              | enum(pendiente, armando, entregado) |
| created_at          | timestamp                           |
| updated_at          | timestamp                           |

La fecha del pedido se registra automáticamente mediante el campo `created_at`.

---

## Tecnologías usadas
- Laravel (framework PHP)
- PostgreSQL (base de datos)
- Bootstrap 5 (interfaz)
- Git / GitHub (control de versiones)
- Laravel Herd (entorno local)

---

## Estructura principal del proyecto

### Archivos clave del CRUD
- `app/Models/Pedido.php`
- `app/Http/Controllers/PedidoController.php`
- `routes/web.php`
- `database/migrations/*_create_pedidos_table.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/pedidos/index.blade.php`
- `resources/views/pedidos/create.blade.php`
- `resources/views/pedidos/edit.blade.php`

---
