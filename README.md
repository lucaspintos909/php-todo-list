[![Docker Build and Push](https://github.com/lucaspintos909/task-manager-php/actions/workflows/docker.yml/badge.svg?branch=main)](https://github.com/lucaspintos909/task-manager-php/actions/workflows/docker.yml)

<p align="center">
  <a href="https://github.com/lucaspintos909/php-todo-list">
    <img src="src/assets/icons/favicon.svg" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Todo List</h3>

  <p align="center">
    Pagina web para manejar tareas facilmente.
    <br />
    <br />
    <a href="https://tareas.lucaspintos.tech">Ver Demo</a>
    ·
    <a href="https://github.com/lucaspintos909/php-todo-list/issues">Reportar un error</a>
  </p>
</p>




## Sobre el proyecto

[![Screenshot][product-screenshot]](https://tareas.lucaspintos.tech)

Con el desarrollo de este proyecto pude aprender las bases de PHP y la arquitectura MVC, la tecnologia docker, y además de eso tambien a implementar las github actions con despliegue continuo (CD o continuous deployment).
<br>
<br>
Para el deploy del demo utilice un servidor EC2 de AWS y un dominio .tech, estos servicios los obtuve gratuitamente gracias a github students, que otorga varios servicios a estudiantes.
<br>
<br>
El proyecto tiene un sistema de usuarios y sesiones (registro y login) para que cada usuario pueda tener sus tareas y no interfieran con las de otros.



### Hecho con
* [Docker - Docker Compose](https://docs.docker.com/)
* [PHP](https://www.php.net/docs.php)
* [MySQL](https://hub.docker.com/_/mysql/)
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)


## Comenzando

El proyecto lo puedes correr localmente ya sea con xampp como con docker.


### Prerrequisitos

#### Con docker

Instalar docker y docker compose
* [Docker](https://www.docker.com/get-started)
* [Docker Compose](https://docs.docker.com/compose/install/)


#### Otros
En el caso de no querer usar docker puedes usar XAMPP o similares.
* [XAMPP](https://www.apachefriends.org/download.html)

<br>

### Instalacion y uso local

1. Clonar el repositorio.
 
   ```sh
   git clone https://github.com/lucaspintos909/php-todo-list.git
   ```
2. #### Cambiar usuario y contraseña de la base de datos en `docker-compose.yml` (opcional).
   -  Si cambia el usuario y/o la contraseña en `docker-compose.yml` debera hacerlo tambien en el archivo de configuracion de PHP en `/src/config/config.php`,
    las constantes `USER` y `PASSWORD`. Asegurese de que coincidan en ambos archivos, de lo contrario dara errores.
3. #### Correr el proyecto
   ```sh
   docker-compose up -d
   ```
   - #### Consejo: Espere un tiempo (5min dependiendo de su pc) hasta que se cree correctamente la base de datos (contenedor de docker), de lo contrario PHP no podra conectarse y le dara error.
   - En caso de que no quieras usar docker y estes usando XAMPP o similares, debes cambiar la contraseña y el usuario de la base datos, en el archivo de configuracion de PHP 
    `/src/config/config.php` por las que configuraste a la hora de instalar XAMPP o lo que estes usando.
 4. #### Abrir el navegador
     - Entrar en la direccion `localhost:8080`. <br>
     - Listo!
    

### Muchas gracias por tomarte el tiempo de ver el proyecto!