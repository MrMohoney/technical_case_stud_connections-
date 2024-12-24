# Configuración de PHPStorm para Symfony 7.2 con Docker

Este documento describe los pasos necesarios para configurar PHPStorm para trabajar con un proyecto Symfony 7.2 en un
entorno Dockerizado. La configuración incluye soporte para PHP, Xdebug, namespaces, rutas y pruebas.

---

## **1. Configurar PHP en PHPStorm**

### **Agregar un intérprete remoto:**

1. Ve a `File > Settings > PHP`.
2. En la sección "CLI Interpreter", haz clic en el icono `+` y selecciona **"From Docker, Vagrant, VM, Remote"**.
3. Selecciona **Docker** como proveedor.
4. Configura el contenedor `php` como intérprete:
    - Haz clic en `...` junto al campo "Server".
    - Crea un nuevo servidor Docker y selecciona tu configuración de Docker (local o remoto).
    - Selecciona el contenedor `php` como contenedor de PHP.
5. PHPStorm detectará automáticamente la versión de PHP y la configuración.

### **Configurar la carpeta raíz del proyecto:**

1. Ve a `File > Settings > Directories`.
2. Marca la carpeta `app/` como **Sources Root**.
3. Marca la carpeta `tests/` como **Test Sources Root**.

---

## **2. Configurar Xdebug**

### **Verificar configuración en el contenedor PHP:**

Asegúrate de que tu archivo `xdebug.ini` (`../.docker/php/xdebug.ini`) incluye estas configuraciones para Xdebug:

```ini
zend_extension=xdebug.so

; Habilitar Xdebug
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.discover_client_host=true
xdebug.client_host=host.docker.internal
xdebug.client_port=9003
xdebug.log=/var/www/html/var/log/xdebug.log
xdebug.idekey=PHPSTORM
xdebug.max_nesting_level=512
```

### **Configurar Xdebug en PHPStorm:**

1. Ve a `File > Settings > Languages & Frameworks > PHP > Debug`.
2. En "Xdebug", asegúrate de que el puerto es `9003`.
3. Activa la opción `"Can accept external connections"`.

### **Configurar mapeo de paths:**

1. Ve a `File > Settings > PHP > Servers`.
2. Agrega un nuevo servidor con:
    - **Name:** `symfony`
    - **Host:** `localhost`
    - **Port:** `80`
    - **Debugger:** Xdebug
3. Configura los mapeos:
    - **File/Directory:** Ruta local a tu carpeta `app/`.
    - **Absolute Path on the server:** `/var/www/html`.

---

## **3. Configurar namespaces y autoload**

### **Configurar Composer:**

PHPStorm detectará automáticamente los namespaces definidos en el archivo `composer.json`. Si no, ve a:

1. `File > Settings > Languages & Frameworks > PHP > Composer`.
2. Asegúrate de que el archivo `composer.json` esté configurado correctamente.

### **Actualizar el índice de PHPStorm:**

1. Ve a `File > Invalidate Caches / Restart > Invalidate and Restart`.

---

## **4. Configurar PHPUnit**

### **Instalar PHPUnit:**

Ya está incluido en el proyecto como dependencia (`phpunit/phpunit: 9.6`).

### **Configurar PHPUnit en PHPStorm:**

1. Ve a `File > Settings > Languages & Frameworks > PHP > Test Frameworks`.
2. Haz clic en `+` y selecciona **PHPUnit by Remote Interpreter**.
3. Selecciona el intérprete remoto configurado previamente (`php`).
4. En "Path to phpunit", usa:
   ```bash
   ./vendor/bin/phpunit
   ```

### **Configurar mapeo de tests:**

1. Ve a `Run > Edit Configurations`.
2. Crea una nueva configuración de PHPUnit y selecciona el directorio `tests/`.

---

## **5. Configurar Symfony Plugin (opcional)**

### **Instalar el plugin de Symfony:**

1. Ve a `File > Settings > Plugins`.
2. Busca e instala el plugin oficial de Symfony.

### **Habilitar el soporte para Symfony:**

1. Ve a `File > Settings > Languages & Frameworks > PHP > Symfony`.
2. Activa la opción **"Enable plugin for this project"**.

---
