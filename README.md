# test-laravel

Aplicación Laravel mínima del laboratorio de pruebas de **ClonVercel**.

| Campo | Valor |
| --- | --- |
| Nombre | `test-laravel` |
| Versión | `v0.1.0` |
| Framework | Laravel 13 (compatible con PHP 8.3+) |
| Vistas | Blade + CSS nativo |
| Base de datos | No requerida |
| Node.js | No requerido |

## Objetivo

Comprobar la detección de PHP/Laravel, la instalación de dependencias con Composer, la configuración del entorno y la ejecución de aplicaciones PHP detrás de un servidor HTTP en contenedores.

## Requisitos

- PHP **8.3** o superior (probado localmente también con 8.4)
- Extensiones PHP: `ctype`, `curl`, `fileinfo`, `json`, `mbstring`, `openssl`, `tokenizer`, `xml`, `pdo` (PDO puede estar presente; la app no lo usa)
- [Composer](https://getcomposer.org/) 2.x

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
```

En Windows PowerShell:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
```

## Ejecución local

El servidor embebido debe poder escuchar en todas las interfaces y en un puerto configurable:

```bash
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
```

PowerShell:

```powershell
php artisan serve --host=0.0.0.0 --port=8000
```

Raíz pública de la aplicación: **`public/`**.

## Pruebas

```bash
php artisan test
```

## Rutas

| Ruta | Descripción |
| --- | --- |
| `GET /` | Inicio con información y metadatos de despliegue |
| `GET /productos` | Listado de 5 productos ficticios (PHP en memoria) |
| `GET /productos/{id}` | Detalle de producto |
| `GET /productos/{id}` (inexistente) | HTTP 404 |
| `GET /api/health` | JSON `{ status, name, version }` sin autenticación |
| `GET /up` | Health check interno de Laravel |

## Variables de entorno

Valores relevantes para ClonVercel (ver `.env.example`):

| Variable | Descripción | Valor por defecto / fallback UI |
| --- | --- | --- |
| `APP_NAME` | Nombre de la aplicación | `test-laravel` |
| `APP_KEY` | Clave de cifrado Laravel | (generar con `key:generate`) |
| `APP_URL` | URL pública | `http://localhost:8000` |
| `APP_VERSION` | Versión de la app | `v0.1.0` |
| `DEPLOY_APP_NAME` | Nombre mostrado en metadatos | `test-laravel` |
| `GIT_BRANCH` | Rama Git del despliegue | «No disponible» |
| `GIT_COMMIT` | Commit del despliegue | «No disponible» |
| `DEPLOYED_AT` | Fecha/hora del despliegue | «No disponible» |
| `SESSION_DRIVER` | Sesión | `file` |
| `CACHE_STORE` | Caché | `file` |
| `QUEUE_CONNECTION` | Colas | `sync` |
| `PORT` | Puerto sugerido para `artisan serve` | `8000` |

No se deben exponer secretos ni credenciales reales. `APP_KEY` se genera localmente y no se versiona (`.env` está en `.gitignore`).

## Configuración sin base de datos

La aplicación usa catálogo PHP en memoria y drivers `file`/`array`/`sync` para sesión, caché y colas. No hay migraciones obligatorias ni consultas SQL en las rutas de negocio.

## Despliegue detrás de un servidor HTTP (contenedores)

Preparada para ejecutarse detrás de un frontend HTTP (Apache/Nginx/Caddy) en contenedores, **sin** Dockerfile incluido todavía:

1. Document root / `root` del servidor web → directorio `public/`.
2. Reenviar todas las rutas no estáticas a `public/index.php` (`.htaccess` incluido para Apache).
3. Confiar en proxies: `TrustProxies` está habilitado para `*` en `bootstrap/app.php`.
4. Inyectar metadatos mediante variables de entorno (`GIT_BRANCH`, `GIT_COMMIT`, `DEPLOYED_AT`, etc.).
5. Ejecutar `composer install --no-dev --optimize-autoloader` y asegurar `APP_KEY`.
6. Permisos de escritura en `storage/` y `bootstrap/cache/`.
7. No requiere Node.js ni build de assets front-end.

Ejemplo de arranque con servidor embebido PHP (útil en pruebas):

```bash
php -S 0.0.0.0:${PORT:-8000} -t public public/index.php
```

## Matriz de pruebas para ClonVercel

| Caso | Esperado |
| --- | --- |
| Detección PHP/Laravel | Reconocer Composer + `artisan` + `public/index.php` |
| `composer install` | Instala dependencias sin Node |
| Variables de entorno | Metadatos visibles en `/`; faltantes → «No disponible» |
| `GET /` | 200, nombre, versión, framework |
| `GET /productos` | 200, 5 productos |
| `GET /productos/1` | 200, detalle |
| `GET /productos/999` | 404 |
| `GET /api/health` | 200 JSON `status=ok`, `name`, `version` sin auth |
| Arranque en `0.0.0.0` y puerto configurable | Servidor responde |
| Ausencia de DB | Páginas y health sin consultas SQL |

## Estructura relevante

```
app/Http/Controllers/   Home, productos, health
app/Support/            ProductCatalog, DeploymentMetadata
config/deploy.php       Metadatos desde env
public/                 Raíz web + css/app.css
resources/views/        Blade
routes/web.php          UI
routes/api.php          /api/health
tests/                  Feature + Unit
```

## Licencia

Proyecto de laboratorio / pruebas.
