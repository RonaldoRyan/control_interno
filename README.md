# Proyecto Control Interno

**Fullstack Application** con backend en Laravel y frontend en React.

## 🔧 Tecnologías

* **Backend**: Laravel 12, Sanctum, DDD (Services, DTOs, Repositories), Policies, Swagger (l5‑swagger)
* **Frontend**: React (Vite + TypeScript), Axios, React Router v6, Tailwind CSS
* **Testing**: PHPUnit (Feature tests), Cypress (E2E futura)

## 🚀 Requisitos

* PHP 8.2+, Composer, MySQL/PostgreSQL
* Node.js 18+, npm
* Extensiones PHP: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON

## 📦 Instalación Backend

1. Clonar repo:

   ```bash
   git clone <tu-repo-url>.git
   cd control_interno
   ```
2. Instalar dependencias:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```
3. Configurar base de datos en `.env`:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=control_interno
   DB_USERNAME=root
   DB_PASSWORD=

   SANCTUM_STATEFUL_DOMAINS=localhost:3000
   SESSION_DOMAIN=localhost
   ```
4. Migrar y seed:

   ```bash
   php artisan migrate --seed
   ```

## 📑 Documentación Swagger

1. Publicar config y assets:

   ```bash
   php artisan vendor:publish --provider="L5Swagger\L5SwaggerServiceProvider"
   ```
2. Generar spec:

   ```bash
   php artisan l5-swagger:generate
   ```
3. Ver en navegador:

   ```
   http://localhost:8000/api/documentation
   ```

## 🧪 Tests Backend

* **Feature tests**: flujo completo de API (autenticación, CRUD, PDF, password recovery)

  ```bash
  php artisan test
  ```

## ⚛️ Instalación Frontend

1. Ir a carpeta frontend:

   ```bash
   cd frontend
   ```
2. Instalar:

   ```bash
   npm install
   ```
3. Configurar `.env.development`:

   ```env
   VITE_API_URL=http://localhost:8000/api/v1
   ```
4. Ejecutar:

   ```bash
   npm run dev
   ```

## 🔐 Autenticación

1. En React, solicitar CSRF:

   ```ts
   await api.get('/sanctum/csrf-cookie');
   ```
2. Login:

   ```ts
   await api.post('/login', { email, password });
   ```
3. Logout:

   ```ts
   await api.post('/logout');
   ```

## 🗂 Arquitectura

* **Controllers** → Exponen endpoints REST
* **Requests** → Validación (FormRequest)
* **DTOs** → Data Transfer Objects
* **Services** → Lógica de negocio
* **Repositories** → Abstracción de persistencia
* **Policies** → Autorización basada en roles
* **Resources** → Transformación de JSON

## 📄 Estructura de Carpetas

```
control_interno/
├─ app/
│  ├─ Http/Controllers/
│  ├─ Services/
│  ├─ DTOs/
│  ├─ Policies/
│  └─ Swagger/
├─ routes/api.php
├─ tests/Feature
└─ tests/Unit
frontend/
├─ src/api/
├─ src/components/
├─ src/pages/
├─ src/services/
└─ src/hooks/
```

## 📖 Referencias

* [Laravel Docs](https://laravel.com/docs)
* [React Docs](https://reactjs.org/docs)
* [Tailwind CSS](https://tailwindcss.com/docs)
* [Laravel Sanctum](https://laravel.com/docs/sanctum)
* [l5-swagger](https://github.com/DarkaOnLine/L5-Swagger)


