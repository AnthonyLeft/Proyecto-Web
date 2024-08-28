Gestión de Libros y Autores

Este proyecto es una aplicación web desarrollada en PHP utilizando el patrón de arquitectura Modelo-Vista-Controlador (MVC).
La aplicación permite gestionar libros y autores mediante un sistema CRUD (Crear, Leer, Actualizar, Eliminar), implementando
peticiones AJAX a través de Axios y estilizado con Bootstrap para una interfaz moderna y responsiva. También se han configurado 
rutas amigables utilizando .htaccess y un router en PHP.

Características:

Modelo MVC: Estructuración del código en Modelos, Vistas y Controladores para una mejor organización y mantenibilidad.
Rutas Amigables: Configuración de .htaccess para redirigir todas las solicitudes a un único punto de entrada (index.php).
CRUD Completo: Operaciones de creación, lectura, actualización y eliminación tanto para libros como para autores.
Modales: Formularios de creación y edición integrados en modales para una mejor experiencia de usuario.
Axios: Gestión de peticiones AJAX para la comunicación entre frontend y backend.
Bootstrap: Interfaz de usuario moderna y responsive con Bootstrap.
Menú de Navegación Dinámico: Facilita la navegación entre la página de inicio, gestión de libros y gestión de autores.
Estructura del Proyecto:

El proyecto está organizado en los siguientes directorios y archivos principales:

Controladores/BD/db.php: Conexión a la base de datos.
Controladores/AutorController.php: Controlador para la gestión de autores.
Controladores/LibroController.php: Controlador para la gestión de libros.
Modelos/Autor.php: Modelo de datos para autores.
Modelos/Libro.php: Modelo de datos para libros.
Vistas/index.html: Página de inicio.
Vistas/autores.html: Página de gestión de autores.
Vistas/libros.html: Página de gestión de libros.
.htaccess: Configuración de rutas amigables.
index.php: Router y punto de entrada principal.
Requisitos Previos:

Antes de ejecutar este proyecto, asegúrate de tener instalado:

XAMPP/WAMP/LAMP: Un servidor web que incluya Apache, PHP y MySQL.
MySQL: Base de datos para almacenar la información de libros y autores.
Git: Para clonar el repositorio y gestionar el control de versiones.
Instalación:

Sigue los siguientes pasos para configurar y ejecutar el proyecto:

Clonar el repositorio:

bash
Copiar código
git clone https://github.com/AnthonyLeft/Proyecto-Web.git

Configurar la base de datos:

Crea una base de datos en MySQL llamada examen.
Importa el archivo examen.sql incluido en el repositorio para crear las tablas libros y autores.


Configurar la conexión a la base de datos:

Abre el archivo Controladores/BD/db.php y asegúrate de que los parámetros de conexión (host, usuario, contraseña) coincidan con tu configuración local.
Configurar el servidor web:

Coloca los archivos del proyecto en la carpeta htdocs de tu instalación de XAMPP (o equivalente en WAMP/LAMP).
Asegúrate de que Apache esté configurado para interpretar archivos .htaccess.
Ejecutar la aplicación:

Inicia Apache y MySQL desde el panel de control de XAMPP (o equivalente).
Abre tu navegador y accede a http://localhost/Examen/Vistas/index.html para ver la aplicación en funcionamiento.
Uso de la Aplicación:

Página de Inicio:

Descripción: Muestra el nombre del proyecto y los nombres de los integrantes del grupo, junto con un resumen de la aplicación.
Navegación: Contiene enlaces a las páginas de gestión de libros y autores.
Gestión de Libros:

Lista de Libros: Muestra una lista de todos los libros en la base de datos.
Crear/Editar Libros: Permite crear un nuevo libro o editar un libro existente utilizando un modal.
Eliminar Libros: Elimina libros de la base de datos.
Gestión de Autores:

Lista de Autores: Muestra una lista de todos los autores en la base de datos.
Crear/Editar Autores: Permite crear un nuevo autor o editar un autor existente utilizando un modal.
Eliminar Autores: Elimina autores de la base de datos.
