# **Symfony 7.2 - Entorno Dockerizado**

Este proyecto utiliza **Symfony 7.2** y está preparado para ejecutarse en un entorno completamente dockerizado, facilitando tanto el desarrollo como la administración de dependencias con **Composer**.

El proyecto está optimizado para ser utilizado en entornos de desarrollo y no de producción.

## **Requisitos previos**

Antes de comenzar, asegúrate de tener instalados los siguientes programas en tu máquina:
- [Docker]()
- [Docker Compose]()
- [Git]()

## **Instalación**

Sigue los pasos a continuación para instalar y configurar todo correctamente.

### 1. Clonar el repositorio

Primero, clona el repositorio en tu máquina local:
``` bash
    git clone https://github.com/MrMohoney/technical_case_stud_connections-.git
    cd tu-repositorio/app
```

### 2. Crear el archivo `.env`

Crea un archivo `.env` en la raíz del proyecto con el valor adecuado para la zona horaria. Si no lo haces, se usará el valor predeterminado `Europe/Berlin`. Ejemplo:
``` env
TIMEZONE=Europe/Berlin
```

### 3. Construir los contenedores de Docker

Construye y levanta los contenedores definidos en el archivo `docker-compose.yml` mediante el siguiente comando:
``` bash
    docker-compose up --build
```

Esto iniciará los servicios necesarios:
- Un contenedor PHP-FPM para Symfony.
- Un contenedor Nginx para servir la aplicación.
- Un contenedor temporal para manejar dependencias con Composer.

### 4. Instalar dependencias con Composer

Ejecuta el siguiente comando para instalar las dependencias de `composer.json` dentro del contenedor de Composer:
``` bash
    docker-compose run --rm composer install
```

Esto instalará tanto las dependencias de producción como las de desarrollo.

## **Uso del proyecto**

### Acceso a la aplicación

Levanta los contenedores
``` bash
    docker-compose up -d
```

Accede al contenedor de PHP
``` bash
    docker exec -it sf72_php bash
```

Ejecuta el comando
``` bash
    bin/console app:challenge
```

### Comandos útiles de Symfony

Para ejecutar comandos de Symfony, puedes acceder al contenedor del servicio PHP ejecutando:
``` bash
    docker exec -it sf72_php bash
```

Una vez dentro del contenedor, todos los comandos de Symfony están disponibles:
``` bash
    php bin/console <comando>
```

Por ejemplo:
- **Limpiar la caché**:
``` bash
    php bin/console cache:clear
```
- **Ver las rutas disponibles**:
``` bash
    php bin/console debug:router
```

### Instalar paquetes adicionales con Composer

Para agregar nuevas dependencias al proyecto utilizando Composer, ejecuta el siguiente comando:
``` bash
    docker-compose run --rm composer require <paquete>
```

## **Estructura de servicios**

Los servicios en este entorno Docker están configurados según el siguiente esquema:

| Servicio | Propósito | Puerto |
| --- | --- | --- |
| **PHP-FPM** | Ejecuta el código PHP | `9000` (interno) |
| **Nginx** | Servidor web para Symfony | `8080` (localhost) |
| **Composer** | Administrador de dependencias | N/A |

Además, Docker utiliza una red personalizada llamada `symfony` para comunicar los contenedores entre sí.

## **Contenedor Nginx**

Nginx se encarga de servir la aplicación y está configurado para enviar las solicitudes a PHP-FPM. La configuración personalizada se encuentra en el directorio:
``` 
.docker/nginx/conf.d
```

Modifica estos archivos si deseas realizar cambios en el comportamiento del servidor.

## **Pruebas**

Este proyecto incluye herramientas para pruebas automatizadas utilizando PHPUnit.

### Ejecutar todas las pruebas

Para ejecutar las pruebas, primero accede al contenedor PHP:
``` bash
    docker exec -it sf72_php bash
```

Luego, ejecuta PHPUnit:
``` bash
    php bin/phpunit
```

Las pruebas se encuentran en el directorio `tests/`.

## **Limpieza y detención**

Si necesitas detener los contenedores, puedes hacerlo mediante:
``` bash
    docker-compose down
```

Para eliminar los contenedores, redes y volúmenes almacenados por Docker, ejecuta:
``` bash
    docker-compose down -v
```

## **Solución de problemas**

### Error 403 en Nginx

Si ves un error `403 Forbidden` al acceder a tu aplicación, verifica los permisos del directorio `var/`:
``` bash
    sudo chmod -R 777 var/
```

Si ves el siguiente error al ejecutar bin/console
```bash
    # /usr/bin/env: 'php\r': No such file or directory
    # /usr/bin/env: use -[v]S to pass options in shebang lines

   # Solución
   sed -i 's/\r$//' bin/console
   chmod +x bin/console
```

## **Autor**

Alberto José Posada Fernández.
