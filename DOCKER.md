# Docker (Local Development)

This repo includes a Docker setup for **local development** using:

- PHP **8.5** + **Apache**
- `docker compose`
- Live code sync via bind mount
- A container-managed `vendor/` volume (so Composer deps work reliably on Windows)

## Prerequisites (Windows)

- Install **Docker Desktop for Windows**
- In Docker Desktop settings:
  - **Use WSL 2 based engine**: enabled (recommended)
  - Ensure your drive/folder is shared/accessible to Docker (Docker Desktop will prompt as needed)

## First-time setup

From PowerShell in the project root:

```powershell
cd C:\web\loganspeed\laravel
docker compose up -d --build
```

Open the app:

- `http://localhost:8080`

## Daily usage

- **Start**:

```powershell
docker compose up -d
```

- **Stop**:

```powershell
docker compose down
```

- **View logs**:

```powershell
docker compose logs -f app
```

## How code sync works

`docker-compose.yml` bind-mounts your project into the container:

- Host `./` → Container `/var/www/html`

So edits you make in your editor appear immediately in the container.

### `vendor/` handling (important)

The compose file also uses a **separate Docker volume** for:

- Container `/var/www/html/vendor`

This prevents your Windows filesystem from overwriting the container’s `vendor/` directory and avoids autoload / missing class issues.

## Running Composer and Artisan

Run commands inside the container:

- **Composer**:

```powershell
docker compose exec app composer install
docker compose exec app composer update
```

- **Artisan**:

```powershell
docker compose exec app php artisan
docker compose exec app php artisan migrate
docker compose exec app php artisan key:generate
```

## When dependencies change (`composer.json` / `composer.lock`)

Because `vendor/` is a Docker volume, you have two options:

- **Option A (recommended)**: run Composer in the container:

```powershell
docker compose exec app composer install
```

- **Option B**: rebuild and recreate volumes (fresh `vendor/`):

```powershell
docker compose down -v
docker compose up -d --build
```

## Configuration

### Port

By default the container maps:

- Host `8080` → Container `80`

Change it in `docker-compose.yml` under `ports:` (example: `8000:80`).

### `.env`

Use your normal Laravel `.env` file in the repo root.

## Troubleshooting

- **Build fails pulling `php:8.5-apache`**
  - If the tag isn’t available on your machine/registry yet, switch `Dockerfile` to `php:8.4-apache` (or whatever PHP version you want) and rebuild:

    ```powershell
    docker compose build --no-cache
    ```

- **“Class not found” / Composer autoload issues**
  - Ensure dependencies are installed in-container:

    ```powershell
    docker compose exec app composer install
    ```

  - If things still look out of sync, reset volumes and rebuild:

    ```powershell
    docker compose down -v
    docker compose up -d --build
    ```

- **Permission issues with `storage/` or `bootstrap/cache`**
  - The image sets these writable during build. If you bind-mount your whole project and Windows ACLs interfere, reset the container and volumes:

    ```powershell
    docker compose down -v
    docker compose up -d --build
    ```

