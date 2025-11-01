# 🚀 Quick Reference - Routing Features

## Resource Routes
```php
// Full CRUD
Route::resource('posts', PostController::class);

// Limited routes
Route::resource('posts', PostController::class)->only(['index', 'show']);
Route::resource('posts', PostController::class)->except(['destroy']);

// With middleware
Route::resource('posts', PostController::class)->middleware('auth');

// API only (no create/edit)
Route::apiResource('api/posts', Api\PostController::class);
```

## HTTP Methods
```php
Route::get($uri, $action);
Route::post($uri, $action);
Route::put($uri, $action);
Route::patch($uri, $action);
Route::delete($uri, $action);
Route::match(['get', 'post'], $uri, $action);
Route::any($uri, $action);
```

## Special Routes
```php
Route::redirect('/old', '/new');              // 302
Route::permanentRedirect('/old', '/new');     // 301
Route::view('/about', 'about');               // Direct view
Route::view('/about', 'about', $data);        // View with data
```

## Route Groups
```php
// Prefix
Route::group(['prefix' => 'admin'], function () { ... });

// Middleware
Route::group(['middleware' => 'auth'], function () { ... });

// Combined
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () { ... });

// With name prefix
Route::group(['as' => 'admin.'], function () {
    Route::get('/users', ...)->name('users'); // admin.users
});
```

## Named Routes
```php
Route::get('/profile', $action)->name('profile');
Route::get('/dashboard', $action)->name('admin.dashboard');
```

## Route Parameters
```php
Route::get('/user/{id}', $action);
Route::get('/posts/{post}/comments/{comment}', $action);
```

## Model Binding
```php
// Automatic model injection
Route::get('/users/{user}', function (User $user) {
    return view('users.show', compact('user'));
});

// In controller
public function edit(User $user) { ... }
```

## Middleware
```php
// Single
Route::get('/admin', $action)->middleware('auth');

// Multiple
Route::get('/admin', $action)->middleware(['auth', 'verified']);

// Group
Route::group(['middleware' => ['auth', 'admin']], function () { ... });
```

## CLI Commands
```bash
php artisan route:list   # List all routes
php artisan route:cache  # Cache routes
php artisan route:clear  # Clear cache
```

## Form Method Spoofing
```html
<!-- PUT request -->
<form method="POST" action="/users/1">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
</form>

<!-- DELETE request -->
<form method="POST" action="/users/1">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
</form>
```

## Resource Route Table
| Verb | URI | Action | Route Name |
|------|-----|--------|------------|
| GET | /photos | index | photos.index |
| GET | /photos/create | create | photos.create |
| POST | /photos | store | photos.store |
| GET | /photos/{id} | show | photos.show |
| GET | /photos/{id}/edit | edit | photos.edit |
| PUT/PATCH | /photos/{id} | update | photos.update |
| DELETE | /photos/{id} | destroy | photos.destroy |

## API Resource Route Table
| Verb | URI | Action | Route Name |
|------|-----|--------|------------|
| GET | /api/photos | index | photos.index |
| POST | /api/photos | store | photos.store |
| GET | /api/photos/{id} | show | photos.show |
| PUT/PATCH | /api/photos/{id} | update | photos.update |
| DELETE | /api/photos/{id} | destroy | photos.destroy |

---

**Pro Tip:** Use `php artisan route:list` to see all your registered routes!
