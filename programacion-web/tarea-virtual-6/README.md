# Gestión de Biblioteca

Este proyecto consiste en un sistema de gestión de biblioteca desarrollado por David Mite Zambrano como parte de la Tarea Virtual 6 del curso DSE08. La aplicación permite llevar un registro de los libros disponibles en la biblioteca, así como realizar operaciones como agregar, editar y eliminar libros.

## Archivos

- **index.php**: Esta es la página principal de la aplicación. Permite agregar nuevos libros a la biblioteca, muestra un listado de libros existentes y proporciona opciones para editar y eliminar libros.
- **registrar-libro.php**: Este archivo maneja la lógica para registrar un nuevo libro en la base de datos. Valida los campos enviados desde el formulario de registro y realiza la inserción en la base de datos.
- **listado.php**: Este archivo se incluye en index.php y muestra un listado de todos los libros existentes en la base de datos. Utiliza una consulta SQL para obtener los libros y los muestra en una tabla HTML.
- **actualizar-libro.php**: Este archivo maneja la lógica para actualizar la información de un libro existente en la base de datos. Recibe los datos del formulario de edición y realiza la actualización en la base de datos.
- **eliminar-libro.php**: Este archivo maneja la lógica para eliminar un libro existente de la base de datos. Se encarga de recibir el ID del libro a eliminar y ejecutar la consulta SQL correspondiente.
- **modal-obtener-libro.php**: Este archivo se incluye en index.php y muestra un modal para editar la información de un libro. Utiliza jQuery para mostrar el modal y pasa el ID del libro a través de los atributos de datos HTML.
- **db-conexion.php**: Este archivo se encarga de establecer la conexión con la base de datos utilizando la función `mysqli_connect()` de PHP. También contiene la lógica para manejar errores de conexión.
- **sesion-helper.php**: Este archivo se incluye al principio de index.php y proporciona funciones relacionadas con la gestión de sesiones, como iniciar una sesión si no está iniciada y almacenar mensajes de sesión para mostrarlos al usuario.

## Funcionalidades

- **Agregar Libros**: Los usuarios pueden agregar nuevos libros especificando el título, autor y cantidad disponible.
- **Editar Libros**: Se proporciona la funcionalidad para editar la información de los libros existentes, incluyendo el título, autor y cantidad disponible.
- **Eliminar Libros**: Los usuarios tienen la opción de eliminar libros de la biblioteca.
- **Visualización de Libros**: Se muestra una tabla con el listado de todos los libros disponibles, con detalles como título, autor y cantidad disponible.

## Funcionalidades

1. Agregar Libros: Los usuarios pueden agregar nuevos libros a la biblioteca ingresando el título, autor y cantidad disponibles.
2. Editar Libros: Existe la opción de editar la información de libros existentes, como el título, autor y cantidad disponible.
3. Eliminar Libros: Se pueden eliminar libros de la biblioteca si ya no están disponibles o si se ingresaron incorrectamente.
4. Listado de Libros: Se muestra un listado completo de todos los libros en la biblioteca, incluyendo su título, autor y cantidad disponible.

##Uso

1. Abre el archivo HTML en un navegador web.
2. Para agregar un nuevo libro:
   - Completa los campos requeridos: título, autor y cantidad disponible.
   - Haz clic en el botón "Registrar Libro".
3. Para editar un libro existente:
   - Haz clic en el botón "Editar" correspondiente al libro que deseas modificar.
   - Actualiza la información del libro en el formulario emergente.
   - Haz clic en el botón "Actualizar Libro".
4. Para eliminar un libro:
   - Haz clic en el botón "Eliminar" correspondiente al libro que deseas eliminar.
5. Los cambios se reflejarán automáticamente en la tabla de libros.

## Notas Adicionales

- Este proyecto es parte de una tarea académica y está diseñado para demostrar la comprensión y aplicación de conceptos de PHP, HTML, CSS y MySQL.
- Este proyecto utiliza PHP para el backend y HTML con Bootstrap para el frontend.
- Las consultas SQL en los archivos PHP están preparadas para evitar inyecciones de SQL.
- Se recomienda configurar la conexión a la base de datos en el archivo db-conexion.php antes de usar la aplicación.
- La aplicación utiliza sesiones para mostrar mensajes de éxito o error al usuario después de realizar operaciones.
- Se recomienda realizar copias de seguridad periódicas de la base de datos para evitar la pérdida de datos importantes.

## Personalización

- **Estilos Personalizados**: Puedes personalizar los estilos del formulario y la tabla de resultados editando el archivo CSS asociado.

## Ejecución

1. Clona este repositorio en tu servidor web.
2. Configura la conexión a la base de datos en el archivo `db-conexion.php`.
3. Accede a la aplicación a través de tu navegador web.
