
# Laravel Live Code Challenge

This challenge aims to evaluate your technical knowledge in Laravel and your ability to work within a modular architecture.

---

## 🎯 Challenge Scope

You are provided with a preconfigured Laravel project that includes:

- Authentication (login/logout)
- A `Note` module already created
- A working `GET /notes` endpoint implemented as an example (`ListNotes` controller)

Your task is to complete the remaining functionality required to fully manage user notes.

---

## 📋 Prerequisites

- Git and Docker installed locally
- Ports **8080** (app) and **8081** (PhpMyAdmin) available
- Testing via Postman or any other REST client

---

## ⚙️ Environment Setup

### 1. Clone the repository

```bash
git clone https://bitbucket.org/pablososa/laravel-live-coding.git
cd laravel-live-coding
```

### 2. Setup and run containers

```bash
cp .env.docker .env
docker compose build
docker compose up -d
```

### 3. Access points

| Service      | URL                    |
|--------------|------------------------|
| Laravel App  | http://localhost:8080/ |
| PhpMyAdmin   | http://localhost:8081/ |

### 4. Reset database if needed

```bash
docker exec -it cit_laravel php artisan migrate:fresh --seed
```

---

## 🔐 Authentication

You can log in using the following credentials:

```json
POST /login
{
  "email": "ana@code.dev",
  "password": "password"
}
```

To log out:

```http
POST /logout
```

---

## 📦 Existing Module: `Note`

The `Note` module is already set up (located at app/Modules/Note) and includes:

- Migration
- Model
- Basic list endpoint (`GET /notes`)

Your task is to complete the module to support full CRUD operations, filtering, and proper access control.

---

### ✍️ Note structure

| Field        | Type     | Details                                                |
|--------------|----------|--------------------------------------------------------|
| `title`      | string   | Required                                               |
| `content`    | longtext | Required                                               |
| `status`     | string   | One of: `draft`, `published`, `archived`              |
| `user_id`    | integer  | Relationship to the user who created the note         |
| `created_at` | datetime | Auto-managed timestamps                                |

> When returning a note (individually or in lists), include the creator's **user name** instead of the `user_id`.

---

## 📌 Endpoints to complete

| Action           | Method | Route                     | Description                         |
|------------------|--------|---------------------------|-------------------------------------|
| View note        | GET    | `/notes/{id}`             | View a specific note                |
| Create note      | POST   | `/notes`                  | Create a new note                   |
| Edit note        | PUT    | `/notes/{id}`             | Update a note                       |
| Delete note      | DELETE | `/notes/{id}`             | Soft delete a note                  |
| Restore note     | POST   | `/notes/{id}/restore`     | Restore a soft-deleted note         |

All operations must:

- Only apply to notes belonging to the authenticated user
- Include proper validation
- Use a policy to enforce ownership-based access

---

## 🔎 Filters for `GET /notes`

Enhance the existing listing endpoint with optional filters:

| Filter         | Parameter  | Example                         |
|----------------|------------|---------------------------------|
| By status      | `status`   | `/notes?status=published`       |
| From date      | `from`     | `/notes?from=2024-05-01`        |
| To date        | `to`       | `/notes?to=2024-05-31`          |
| Text search    | `q`        | `/notes?q=important`            |
| Sorting        | `sort`     | `/notes?sort=date_desc`         |

Valid values for `sort`:  
- `date_asc`, `date_desc`, `title_asc`, `title_desc`

---

## ✅ What we will evaluate

- Completion of all required features
- Correct use of controllers, form requests, models, and policies
- Filtering and sorting implementation
- Validation and error handling
- Policy enforcement to restrict note access to owners
- Display of `user.name` instead of `user_id` in responses
- Clean, readable and modular code following Laravel best practices

---

Let us know if you need any clarifications. Good luck!
