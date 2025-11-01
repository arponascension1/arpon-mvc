# Arpon MVC Framework

A modern PHP MVC framework inspired by Laravel, featuring advanced routing, Eloquent ORM, authentication, and more.

## Version

**v1.0.0** - Initial Release

## Features

- ✅ **Advanced Routing** - Laravel-style routing with resource routes, model binding, constraints
- ✅ **Eloquent ORM** - Complete database abstraction with relationships
- ✅ **Authentication System** - Guards, middleware, and session management
- ✅ **Middleware Pipeline** - Flexible request/response handling
- ✅ **Validation** - Comprehensive request validation
- ✅ **View Engine** - Blade-like templating with layouts and sections
- ✅ **Artisan Console** - CLI commands for development
- ✅ **Service Container** - Powerful dependency injection
- ✅ **CSRF Protection** - Built-in security features
- ✅ **Session Management** - Secure session handling
- ✅ **Mail System** - PHPMailer integration
- ✅ **File Storage** - Abstract filesystem operations

## Requirements

- PHP 8.0 or higher
- MySQL, PostgreSQL, or SQLite
- Composer
- PDO PHP Extension
- OpenSSL PHP Extension
- Mbstring PHP Extension

## Quick Start

### Installation

```bash
# Clone the repository
git clone https://github.com/arponascension1/arpon-mvc.git
cd arpon-mvc

# Install framework core
git clone https://github.com/arponascension1/arpon-framwork.git framework-temp
cp -r framework-temp/src .
rm -rf framework-temp

# Install dependencies
composer install

# Configure environment
cp .env.example .env

# Edit .env file with your database credentials
nano .env

# Run migrations
php artisan migrate

# Start development server
php artisan serve
```

Visit: `http://localhost:8000`

## Project Structure

```
arpon-mvc/
├── app/
│   ├── Console/
│   │   ├── Commands/         # Custom artisan commands
│   │   └── Kernel.php         # Console kernel
│   ├── Http/
│   │   ├── Controllers/       # Application controllers
│   │   └── Middleware/        # HTTP middleware
│   ├── Models/                # Eloquent models
│   └── Seeders/               # Database seeders
├── bootstrap/
│   └── app.php                # Application bootstrap
├── config/                    # Configuration files
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   └── session.php
├── database/
│   └── migrations/            # Database migrations
├── public/                    # Public assets & entry point
│   ├── index.php
│   └── .htaccess
├── resources/
│   └── views/                 # View templates
├── routes/
│   └── web.php                # Web routes
├── src/                       # Framework core (Arpon Framework)
├── vendor/                    # Composer dependencies
├── .env.example               # Environment example
├── artisan                    # Artisan CLI
├── composer.json              # Composer configuration
└── README.md
```

## Usage Examples

### Routing

```php
// routes/web.php
use Arpon\Support\Facades\Route;

// Basic routes
Route::get('/', function() {
    return view('welcome');
});

// Controller routes
Route::get('/users', [UserController::class, 'index']);

// Resource routes (RESTful)
Route::resource('posts', PostController::class);

// Route groups with middleware
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

// Named routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
```

### Controllers

```php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Arpon\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);
        
        User::create($request->all());
        return redirect('/users');
    }
    
    // Implicit model binding
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }
}
```

### Models

```php
// app/Models/Post.php
namespace App\Models;

use Arpon\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```

### Views

```php
<!-- resources/views/posts/index.php -->
<?php layout('layouts.app'); ?>

<?php section('content'); ?>
    <h1>Posts</h1>
    <?php foreach($posts as $post): ?>
        <article>
            <h2><?= $post->title ?></h2>
            <p><?= $post->content ?></p>
        </article>
    <?php endforeach; ?>
<?php endSection(); ?>
```

### Migrations

```php
// database/migrations/create_posts_table.php
use Arpon\Database\Migration;
use Arpon\Database\Schema\Blueprint;
use Arpon\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
```

## Artisan Commands

```bash
# Start development server
php artisan serve

# Database migrations
php artisan migrate
php artisan migrate:rollback

# Create migration
php artisan make:migration create_posts_table

# Routes
php artisan route:list        # List all routes
php artisan route:cache       # Cache routes for production
php artisan route:clear       # Clear route cache

# Other
php artisan storage:link      # Create storage symlink
php artisan db:wipe           # Drop all tables
```

## Advanced Features

### Route Model Binding

```php
Route::get('/users/{user}', function(User $user) {
    return $user; // Automatically queries User::find($id)
});
```

### Custom Model Binding

```php
Route::bind('user', function($value) {
    return User::where('slug', $value)->firstOrFail();
});
```

### Route Constraints

```php
Route::get('/users/{id}', UserController::class)->whereNumber('id');
Route::get('/posts/{slug}', PostController::class)->whereAlpha('slug');
Route::get('/api/{uuid}', ApiController::class)->whereUuid('uuid');
```

### Middleware

```php
// app/Http/Middleware/CheckAge.php
public function handle(Request $request, Closure $next)
{
    if ($request->age < 18) {
        return redirect('/');
    }
    return $next($request);
}
```

### Form Requests

```php
class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }
}
```

## Framework Core

The framework core is maintained separately at:
https://github.com/arponascension1/arpon-framwork

## Documentation

For complete documentation, visit the framework repository.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

Open-source software. Free to use and modify.

## Credits

Inspired by the Laravel Framework and built with modern PHP best practices.

## Author

**Arpon Ascension**
- GitHub: [@arponascension1](https://github.com/arponascension1)
- Email: arponascension20@gmail.com

## Changelog

### Version 1.0.0 (2025-11-01)
- Initial release
- Complete routing system with Laravel-style features
- Eloquent ORM with relationships
- Authentication and authorization
- Middleware pipeline
- View templating system
- Artisan console commands
- Comprehensive validation
- CSRF protection
- Session management


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
