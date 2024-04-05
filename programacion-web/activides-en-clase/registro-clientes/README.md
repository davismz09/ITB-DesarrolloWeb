# Sistema de Registro de Clientes

Este proyecto consiste en un sistema de registro de clientes desarrollado en PHP y HTML. Permite agregar nuevos clientes a un archivo txt y listar los clientes registrados.

## Archivos Principales

- **index.php**: Página principal del sistema que muestra un menú de opciones y enlaces para registrar clientes, ver el listado de clientes y salir del sistema.
- **registro.php**: Página donde se registra un nuevo cliente. Contiene un formulario para ingresar los datos del cliente y un botón para enviar la información al servidor.
- **listado.php**: Página que muestra un listado de todos los clientes registrados en la base de datos.
- **encabezado.php**: Archivo PHP que se incluye en las páginas para mostrar el encabezado común del sitio.
- **pie.php**: Archivo PHP que se incluye en las páginas para mostrar el pie de página común del sitio.
- **estilo.css**: Hoja de estilos CSS para el diseño y la presentación del sitio web.

## Funcionalidades

1. **Registro de Clientes**: Los usuarios pueden registrar nuevos clientes ingresando su nombre, dirección, teléfono y fecha de nacimiento.
2. **Listado de Clientes**: Se muestra un listado completo de todos los clientes registrados en la base de datos, incluyendo su número de registro, nombre, dirección, teléfono y fecha de nacimiento.

## Uso

1. Abre el archivo `index.php` en tu navegador web.
2. Para registrar un nuevo cliente:
   - Haz clic en el enlace "Registro de nuevo Cliente".
   - Completa el formulario con los datos del cliente.
   - Haz clic en el botón "REGISTRAR CLIENTE".
3. Para ver el listado de clientes registrados:
   - Haz clic en el enlace "Listado de clientes".
4. Para salir del sistema:
   - Haz clic en el enlace "Salir".

## Consideraciones

- Este proyecto utiliza PHP para el backend y HTML con CSS para el frontend.
- Se recomienda configurar la conexión a la base de datos en los archivos PHP correspondientes antes de usar el sistema.
- La aplicación utiliza archivos de texto para almacenar los datos de los clientes. Se puede implementar una base de datos MySQL para un mejor rendimiento y escalabilidad.
- Se recomienda realizar copias de seguridad periódicas de los archivos de datos para evitar la pérdida de información importante.

## Personalización

- Puedes personalizar el diseño y la presentación del sitio web modificando el archivo `estilo.css`.

## Ejecución

1. Clona este repositorio en tu servidor web.
2. Configura la conexión a la base de datos en los archivos PHP correspondientes en caso de que decidas utilizar alguna base de datos.
3. Accede a la aplicación a través de tu navegador web.

---
