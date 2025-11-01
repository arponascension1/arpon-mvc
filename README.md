# Arpon MVC Framework Application

A modern PHP MVC application built with the Arpon Framework featuring user authentication and CRUD operations.

## Features

- ✅ User Authentication (Login/Register/Logout)
- ✅ User Management (CRUD Operations)
- ✅ Laravel-style Routing with Resource Routes
- ✅ Model Binding
- ✅ Request Validation
- ✅ Session Management
- ✅ CSRF Protection
- ✅ Middleware Support
- ✅ Eloquent ORM
- ✅ View Templating System

## Requirements

- PHP 8.0 or higher
- MySQL or SQLite
- Composer

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/arponascension1/arpon-mvc.git
   cd arpon-mvc
   ```

2. **Install the Arpon Framework:**
   
   Clone the framework repository as a submodule or directly into your project:
   
   ```bash
   git clone https://github.com/arponascension1/arpon-framwork.git framework-temp
   cp -r framework-temp/src .
   rm -rf framework-temp
   ```

3. **Install dependencies:**
   ```bash
   composer install
   ```

4. **Configure environment:**
   ```bash
   cp .env.example .env
   ```
   
   Edit `.env` and set your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations:**
   ```bash
   php artisan migrate
   ```

6. **Start the development server:**
   ```bash
   php artisan serve
   ```

7. **Visit the application:**
   
   Open your browser and go to: `http://localhost:8000`

## Project Structure

```
arpon-mvc/
├── app/
│   ├── Console/
│   │   └── Commands/         # Custom artisan commands
│   ├── Http/
│   │   ├── Controllers/      # Application controllers
│   │   └── Middleware/       # HTTP middleware
│   ├── Models/               # Eloquent models
│   └── Seeders/              # Database seeders
├── bootstrap/
│   └── app.php               # Application bootstrap
├── config/                   # Configuration files
├── database/
│   └── migrations/           # Database migrations
├── public/                   # Public assets & entry point
├── resources/
│   └── views/                # View templates
├── routes/
│   └── web.php               # Web routes
└── src/                      # Framework core (git ignored)
```

## Usage

### Available Routes

```bash
php artisan route:list
```

### User Management

- **List Users:** `GET /users`
- **Create User:** `GET /users/create`
- **Store User:** `POST /users`
- **Edit User:** `GET /users/{user}/edit`
- **Update User:** `PUT /users/{user}`
- **Delete User:** `DELETE /users/{user}`

### Authentication

- **Login:** `GET /login`
- **Register:** `GET /register`
- **Profile:** `GET /profile`
- **Logout:** `POST /logout`

## Advanced Routing Features

This application uses advanced Laravel-style routing features:

### Resource Routes

```php
Route::resource('users', UserController::class);
```

### Route Groups with Middleware

```php
Route::middleware(['auth'])->group(function() {
    Route::resource('users', UserController::class);
});
```

### Model Binding

Controllers automatically receive model instances:

```php
public function edit(User $user) {
    return view('users.edit', ['user' => $user]);
}
```

See the [ROUTING_FEATURES.md](ROUTING_FEATURES.md) for complete routing documentation.

## Framework Documentation

For framework-specific features and API documentation, visit:
[Arpon Framework Repository](https://github.com/arponascension1/arpon-framwork)

## License

This project is open-sourced software.

## Author

**Arpon Ascension**
- GitHub: [@arponascension1](https://github.com/arponascension1)
- Email: arponascension20@gmail.com
