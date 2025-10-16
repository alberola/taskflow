# 🐳 Taskflow — Entorno Laravel con Docker

Taskflow es un proyecto personal orientado a la gestión de tareas y productividad.

Este repositorio contiene el entorno completo de desarrollo, configurado con **Docker Compose**, **Laravel**, **MySQL**, **Nginx** y **phpMyAdmin**.  
El objetivo es que cualquier persona pueda clonar el proyecto, levantar los contenedores y probar el backend de Laravel sin configuraciones adicionales.

> ⚠️ El frontend con Vue y el servicio Node están definidos en el entorno, pero **aún no están implementados**.

---

## 🧱 1️⃣ Requisitos previos

Antes de comenzar, asegúrate de tener instalado:

| Herramienta | Versión mínima recomendada | Notas |
|--------------|-----------------------------|--------|
| 🐳 Docker Desktop | Última versión estable | Debe estar **ejecutándose** (icono de la ballena activo) |
| 🧰 Git | ≥ 2.40 | Para clonar el repositorio |
| 🐘 PHP + Composer | ≥ 8.3 / 2.7 | Solo si deseas ejecutar comandos de Laravel fuera del contenedor |
| 🧩 Node + npm | ≥ 20 / 10 | (No requerido por ahora) Solo útil cuando se implemente el frontend |

---

## ⚙️ 2️⃣ Clonar el repositorio


-git clone https://github.com/tuusuario/taskflow.git 

> El proyecto ya incluye:
> - Código fuente de Laravel.
> - Archivos `docker-compose.yml`, `Dockerfile` y configuración de Nginx.
> - Conexión lista con MySQL y phpMyAdmin.

---

## 🐳 3️⃣ Levantar el entorno Docker

Desde la raíz del proyecto:

```bash
docker compose up -d --build
```
Esto levantará los siguientes servicios:

| Servicio | Puerto | Descripción |
|-----------|---------|-------------|
| **nginx** | 8080 | Servidor web que sirve la aplicación |
| **mysql** | 3306 | Base de datos MySQL |
| **phpmyadmin** | 8081 | Interfaz web para gestionar la base de datos |
| **node** | — | Contenedor definido pero aún no utilizado (para el futuro frontend Vue) |

---
## ⚙️ 4️⃣ Comandos para arrancar Laravel

Entra al contenedor PHP:

```bash
docker exec -it taskflow_app bash
composer install
php artisan key:generate
php artisan migrate
```

## 🌐 5️⃣ Accesos rápidos

| Recurso | URL / Datos | Descripción |
|----------|--------------|-------------|
| **Aplicación Laravel** | [http://localhost:8080](http://localhost:8080) | Página principal del backend |
| **phpMyAdmin** | [http://localhost:8081](http://localhost:8081) | Interfaz para gestionar MySQL |
| **Base de datos** | `host: mysql` – `user: taskflow_user` – `pass: taskflow_pass` | Configurada automáticamente |

---


---

## 🧠 6️⃣ Errores comunes y soluciones (basado en experiencia real)

| Problema | Causa | Solución |
|-----------|--------|-----------|
| `Cannot connect to the Docker daemon` | Docker Desktop no está corriendo | Abre Docker Desktop 🐳 |
| `SQLSTATE[HY000] [2002] Connection refused` | `.env` con `DB_HOST=127.0.0.1` | Cambiar a `DB_HOST=mysql` |
| `Access denied for user` | Credenciales distintas a las del `docker-compose.yml` | Verificar `DB_USERNAME` y `DB_PASSWORD` en .env|

---

## MUY IMPORTANTE: <br>
Recordar cambiar valores en el archivo .env.example que genera laravel automaticamente por los deseados (los mismos que se tienen en el docker-compose.yml de la base de datos) y darle el nombre de .env solamente una vez lo tenemos listo en nuestro equipo.


## ⚙️ 7️⃣ Frontend (Vue / Node)

El servicio Node y el entorno para Vue **ya están definidos en el `docker-compose.yml`**,  
pero **todavía no se ha implementado ningún proyecto frontend**.

Cuando se integre, se levantará automáticamente en el puerto **5173** con:

```bash
docker compose up -d node
```
Hay que destacar que en este caso tendrias que levantar node solamente en el caso de que no estuviera caido, como está actualmente (En caso de que estuviera como ahora mismo, igualmente se irá actualizando).

---

---

## ✅ 8️⃣ Verificación Adicional

Comprueba que todos los contenedores estén activos:

```
docker ps
```

Deberías ver algo así:


> taskflow_app         Up <br>
> taskflow_nginx       Up <br>
> taskflow_mysql       Up <br>
> taskflow_phpmyadmin  Up <br>


---

## 🧩 Notas finales
 
- Si eliminas los contenedores, los datos de MySQL se conservarán en el volumen `mysql_data`.

La mayoría de las instrucciones de esta guía como :
"composer install", "php artisan migrate" o "php artisan key:generate"
se ejecutan desde dentro del contenedor Docker y no directamente desde tu sistema operativo.
Esto se debe a que el contenedor actúa como un entorno de servidor real, aislado de tu máquina local.
De esta forma:

🧩 Garantiza compatibilidad: el entorno del contenedor usa exactamente las mismas versiones de PHP, Composer y extensiones que el proyecto requiere.

🧱 Evita conflictos locales: no importa qué versión de PHP o MySQL tengas instalada en tu ordenador; Docker proporciona las suyas propias.

🔁 Asegura reproducibilidad: cualquier persona que clone el repositorio obtendrá el mismo comportamiento, sin depender de su sistema operativo o configuración local.


En resumen, al ejecutar los comandos dentro del contenedor, estás trabajando dentro del mismo entorno en el que se ejecuta la aplicación,
asegurando que todo funcione igual para cualquier desarrollador o entorno.

- Para reconstruir:

  > docker compose down -v <br>
  > docker compose up -d --build

---

✍️ **Autor:** Alejandro Alberola
📅 **Última actualización:** Octubre 2025  
🧱 **Estado actual:** Backend funcional — Frontend en desarrollo
