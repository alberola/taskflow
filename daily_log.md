
# 📆 Daily Log – TaskFlow

Registro diario de avances, bloqueos y resultados del proyecto.

---

## 🧱 Semana 1 – 13 al 17 de octubre

| Fecha | Actividad | Resultado |
|:--|:--|:--|
| **Lun 13 oct** | Creación del repositorio `taskflow`, configuración de archivos base (`README.md`, `DAILY_LOG.md`, `RETRO.md`) y tablero en GitHub Projects. | ✅ Estructura inicial creada correctamente. |
| **Mar 14 oct** | Creación de `docker-compose.yml`, carpeta `nginx` y configuración de servicios (`app`, `db`, `web`, `phpMyAdmin`). | ✅ Entorno Docker listo y funcionando. |
| **Mié 15 oct** | Instalación de Laravel dentro del contenedor y configuración del `.env`. | ✅ Laravel ejecutándose en `localhost:8000`. |
| **Jue 16 oct** | Configuración de conexión MySQL, ejecución de migraciones y prueba en phpMyAdmin. | ✅ Base de datos conectada correctamente. |
| **Vie 17 oct** | No se realizó — trabajando en otro proyecto (3DMakerProject). | ⚠️ Tareas reprogramadas al lunes 20 oct. |

---

## ⚙️ Semana 2 – 20 al 24 de octubre

| Fecha | Actividad | Resultado |
|:--|:--|:--|
| **Lun 20 oct** | No se realizó — sin actividad de desarrollo. | ⚠️ Pendiente de retomarse. |
| **Mar 21 oct** | Configuración del workflow de CI/CD (`.github/workflows/ci.yml`) con pasos `composer install`, `php artisan test`, `php artisan migrate`. Verificación en GitHub Actions. | ✅ CI/CD funcional. Avance recuperado respecto al retraso previo. |

📌 **Resumen actual:**
- ✅ Semana 1 completada correctamente (excepto viernes reprogramado).  
- 🔁 Workflow de CI/CD configurado el martes 21 oct (recuperando el retraso).  
- ⚙️ Próximo paso: crear modelo `Task` y continuar con la planificación semanal.
