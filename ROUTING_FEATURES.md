# Advanced Routing Features - Upgrade Guide

Your Arpon MVC framework now includes advanced Laravel-like routing features! 🚀

## Table of Contents
1. [Resource Routes](#resource-routes)
2. [API Resources](#api-resources)
3. [Multiple HTTP Methods](#multiple-http-methods)
4. [Redirect Routes](#redirect-routes)
5. [View Routes](#view-routes)
6. [Route Model Binding](#route-model-binding)
7. [Route Caching](#route-caching)
8. [Route Management Commands](#route-management-commands)

---

## Resource Routes

Automatically create all CRUD routes for a resource controller.

### Basic Usage

```php
Route::resource('users', App\Http\Controllers\UserController::class);
```

This creates the following routes:

| Method | URI | Action | Route Name |
|--------|-----|--------|------------|
| GET | /users | index | users.index |
| GET | /users/create | create | users.create |
| POST | /users | store | users.store |
| GET | /users/{user} | show | users.show |
| GET | /users/{user}/edit | edit | users.edit |
| PUT/PATCH | /users/{user} | update | users.update |
| DELETE | /users/{user} | destroy | users.destroy |

### Limiting Routes

```php
// Only specific routes
Route::resource('posts', PostController::class)->only(['index', 'show']);

// Exclude specific routes
Route::resource('photos', PhotoController::class)->except(['destroy']);
```

---

## API Resources

Create API-only routes (excludes `create` and `edit` form routes).

```php
Route::apiResource('api/products', Api\ProductController::class);
```

Creates: `index`, `store`, `show`, `update`, `destroy`

---

## Multiple HTTP Methods

### Match Specific Methods

```php
Route::match(['get', 'post'], '/form', function () {
    return view('form');
});
```

### Match All Methods

```php
Route::any('/webhook', function () {
    // Handle any HTTP method
    return 'Webhook received';
});
```

---

## Redirect Routes

### Temporary Redirect (302)

```php
Route::redirect('/old-url', '/new-url');
```

### Permanent Redirect (301)

```php
Route::permanentRedirect('/old-page', '/new-page');
```

### Custom Status Code

```php
Route::redirect('/temp', '/destination', 307);
```

---

## View Routes

Return views directly without a controller.

```php
// Simple view
Route::view('/about', 'about');

// View with data
Route::view('/terms', 'terms', ['version' => '2.0']);
```

---

## Route Model Binding

Automatically inject model instances into your routes.

### In Routes

```php
Route::get('/users/{user}', function (App\Models\User $user) {
    // $user is automatically loaded by ID
    return view('users.show', compact('user'));
});
```

### In Controllers

```php
// Route
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

// Controller
public function edit(Post $post)
{
    // $post is automatically loaded
    return view('posts.edit', compact('post'));
}
```

**Note:** The model must have a `find()` method. Works automatically with Eloquent models.

---

## Route Caching

Optimize route registration in production by caching routes.

### Benefits
- Faster route registration
- Reduced overhead in production
- Better performance

### Limitations
- **Closures cannot be cached** - use controller methods instead
- Cache must be cleared when routes change

---

## Route Management Commands

### List All Routes

```bash
php artisan route:list
```

Shows a formatted table of all registered routes with:
- HTTP Method
- URI
- Route Name
- Controller Action

### Cache Routes

```bash
php artisan route:cache
```

Caches all routes for production. Routes are saved to `bootstrap/cache/routes.php`.

### Clear Route Cache

```bash
php artisan route:clear
```

Removes the cached routes file.

---

## Practical Examples

### Blog with Admin Section

```php
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{post}', [BlogController::class, 'show'])->name('show');
    
    // Admin routes
    Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
        Route::resource('posts', BlogPostController::class);
    });
});
```

### API with Versioning

```php
Route::group(['prefix' => 'api/v1', 'as' => 'api.v1.'], function () {
    Route::apiResource('users', Api\V1\UserController::class);
    Route::apiResource('products', Api\V1\ProductController::class);
});
```

### Authenticated User Management

```php
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('users', UserController::class);
    Route::redirect('/dashboard', '/admin/users');
});
```

---

## Migration from Old Routes

### Before (Manual CRUD Routes)

```php
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::post('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
```

### After (Using Resource Routes)

```php
Route::resource('users', UserController::class)->middleware('auth');
```

**Much cleaner and more maintainable!** ✨

---

## Tips and Best Practices

1. **Use Resource Routes** for CRUD operations instead of defining routes manually
2. **Cache Routes in Production** for better performance
3. **Use Controller Methods** instead of closures if you plan to cache routes
4. **Group Related Routes** with common prefixes and middleware
5. **Name Your Routes** for easier URL generation
6. **Use API Resources** for RESTful APIs (excludes form routes)
7. **Leverage Route Model Binding** to automatically inject models

---

## Complete Example

See `routes/examples.php` for a comprehensive guide with all routing features demonstrated.

---

## Questions?

Check your existing routes with:
```bash
php artisan route:list
```

This will show you exactly how your routes are registered!
