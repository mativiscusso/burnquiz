<h1>BURN QUIZ</h1>

1- Clonar repositorio para tener el proyecto instalado de manera local. Ubicados en la ruta del proyecto ejecutar el comando:

composer install

2- Crear Base de Datos llamada "burnquiz_db"

Desde consola o desde phpMyAdmin.

3- Chequear que en el archivo .env figure correctamente el nombre de la base de datos para su conexion.

4- Ubicados por consola en el PATH donde clonaron el repositorio o desde la consola de su editor de texto correr los siguientes comandos:

php artisan key:generate

php artisan migrate

php artisan db:seed (Genera usuario Administrador para interactuar con el Panel de Control)

php artisan storage:link

php artisan serv 

Datos de acceso como Administrador

Email: administrador@admin.com Password: admin1234

5- Inicializar programa que brinde conexion a base de datos (por ejemplo XAMPP)

6- Abrir el navegador e ingresar a la ruta

`localhost:8000`

7- Cargar algunas preguntas con sus respectivas respuestas para probar funcionalidad.

8- Registrarse con usuario y contraseña propio o jugar con el perfil administrador.
