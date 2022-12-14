# Manual de Instalacion Test BIG HOLDING

### Requisitos

- PHP v8.0 o superior
- node v16.14.0
- Mysql 5.7.19. or MariaDB 10.7.3
- Composer
- Extensi贸n pdo_sqlite habilitada.

### Instalaci贸n 馃敡
1. Clonar el repositorio en el folder del servidor web en uso o en el de su elecci贸n, **este folder debe tener permisos para que php se pueda ejecutar por CLI y permisos de lectura y escritura para el archivo .env**.

```sh 
git clone https://github.com/TheNoiseD/laravelTest.git 
```

2. Instalar paquetes ejecutando en la ra铆z del folder.

```sh 
composer install
```
Tambien instalar las dependencias de node.
```sh
npm install
```
3. Crear BD con COLLATE 'utf8mb4_general_ci'.

```sh 
`CREATE DATABASE laravel COLLATE 'utf8mb4_general_ci';`
```

4. Duplique el archivo `.env.example` incluido en uno de nombre `.env` y dentro de este ingrese los valores de las variables de entorno necesarias

#### Variables a destacar
- `API_TOKEN`: Url base de la api de Place to pay.
- `API_URL`: Login de la api de Place to pay.

5. Ejecute los siguientes comandos para poner en marcha las configuraciones del sitio.

```sh
php artisan key:generate
``` 
```sh
php artisan migrate
```
```sh
php artisan db:seed
```
```sh
npm run build
```
6. Para poner la aplicaci贸n en marcha tiene varias opciones.

- Configurar el servidor web para que apunte a la carpeta public del proyecto.

- Ejecutar el comando `php artisan serve` en la ra铆z del proyecto y acceder a la url.

7.Debe para testear la api debe ingresar a la base de datos y tomar un mail valido de la tabla users para loguearse y obtener el token de autenticaci贸n.

### Endpoints
- `POST /api/login`: Endpoint para loguearse y obtener el token de autenticaci贸n.
- `GET /api/logout`: Endpoint para cerrar sesi贸n.
- `GET /api/clients`: Endpoint para obtener los clientes.'
- `GET /api/clients/{id}`: Endpoint para obtener un cliente.'
- 

## Autor 鉁掞笍

* **Guillermo Ordo帽ez** [anthmon19@gmail.com](mailto:anthmon19@gmail.com)
