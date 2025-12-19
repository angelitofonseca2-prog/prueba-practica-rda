# Examen Práctico – Desarrollo en Plataformas  
## CASO 12 – Florería “Flores del Valle”

---

## Descripción del caso
La florería **Flores del Valle**, administrada por Doña Rosa, necesitaba un sistema que permita registrar y gestionar pedidos de arreglos florales para **cumpleaños, bodas y funerales**, reemplazando el registro manual en cuaderno.

El sistema permite llevar un control ordenado de los pedidos, evitar olvidos, actualizar información cuando sea necesario y consultar los pedidos desde dispositivos móviles.

---

## Funcionalidades
- ✅ Crear pedido (formulario)
- ✅ Listar pedidos (tabla)
- ✅ Editar pedido (formulario prellenado)
- ✅ Eliminar pedido (eliminación permanente)
- ✅ Gestión de estados: pendiente, armando, entregado
- ✅ Interfaz responsive (Bootstrap, probado en vista móvil)

---

## Decisiones de diseño

### Estado del pedido
- Al **crear un pedido**, el estado se asigna automáticamente como **pendiente**.
- El usuario **no puede seleccionar el estado** al momento de la creación.
- El estado del pedido puede modificarse posteriormente desde la opción **Editar pedido**.

### Eliminación de pedidos
- El sistema permite la **eliminación permanente de pedidos** mediante la operación DELETE del CRUD.
- Al eliminar un pedido, el registro se borra definitivamente de la base de datos.

### Validaciones
- Todos los campos del formulario son **obligatorios**.
- El número de teléfono debe contener **exactamente 10 dígitos numéricos**.
- La fecha de entrega **no puede ser anterior a la fecha actual**.
- Las validaciones se aplican tanto en **backend** como en **frontend**.

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

## Capturas de pantalla

Las capturas de pantalla del sistema se encuentran en la carpeta `/Capturas` y evidencian el funcionamiento del CRUD de pedidos.

### Lista de pedidos
![Lista de pedidos](Capturas/Lista%20de%20pedidos.png)

### Crear pedido
![Crear pedido](Capturas/Crear%20pedido.png)

### Editar pedido
![Editar pedido](Capturas/Editar%20pedido.png)

### Eliminar pedido – Parte 1
![Eliminar pedido parte 1](Capturas/Eliminar%20Pedido-Parte%201.png)

### Eliminar pedido – Parte 2
![Eliminar pedido parte 2](Capturas/Eliminar%20Pedido-Parte%202.png)

---

## Repositorio del proyecto
El código fuente del proyecto se encuentra disponible en el siguiente repositorio público de GitHub:

🔗 https://github.com/angelitofonseca2-prog/prueba-practica-rda
