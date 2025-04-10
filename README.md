# Laravel Multi-Tenant Blog System

A multi-tenant blog system built with Laravel for assessment purposes. Users register and await admin approval. Once approved, they are assigned a tenant and can create/manage their blog posts via Web or API. Admins can view all posts.

---

##  Features

- User registration with pending approval
- Admin approval & automatic tenant creation
- Tenant blog post management (Web + API)
- Admin view of all tenant posts (Web + API)
- API authentication using Laravel Sanctum
- Well-structured code following SOLID principles

---

## Tech Stack

- Laravel 12
- PHP 8.x
- MySQL
- Laravel Sanctum (API authentication)
- Postman (API testing)
- Blade (for web interface)

---

##  Installation & Setup

```bash
git clone https://github.com/kikky1/multi-tenant-blog
cd your-repo-name
composer install laravel/laravel multi-tenancy
cp .env.example .env
php artisan migrate
php artisan serve

Ensure you have a database configured in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
```

---

##  API Authentication with Sanctum

### 1. Register (pending approval)
**POST** `/api/register`
```json
{
  "name": "User 1",
  "email": "user1@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### 2. Admin approves user via web dashboard

### 3. Login to get token
**POST** `/api/login`
```json
{
  "email": "user1@example.com",
  "password": "password"
}
```

Use the returned token for all protected API requests by including this header:

```
Authorization: Bearer your_token_here
```

---

##  API Documentation

Postman Collection: [View / Download](docs/postman_collection.json)

> Or import manually into Postman from `docs/postman_collection.json` in this repo.

---

##  Directory Structure

```
app/
├── Models/ (User, Tenant, Post)
├── Http/
│   ├── Controllers/
│   │   ├── 
│   │   ├── API/
├── Middleware/
routes/
├── web.php
├── api.php
resources/views/
docs/
├── postman_collection.json
```

---

##  Contact

For any questions or follow-up, reach out via [email or GitHub issues].
