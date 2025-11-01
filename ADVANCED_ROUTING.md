# Advanced Routing Features - Part 2

## New Features Added 🚀

Your routing system now includes 7 additional powerful features:

### 1. **Route Parameter Constraints** ✅

Validate route parameters with built-in constraints:

```php
// Numeric only
Route::get('/user/{id}', $action)->whereNumber('id');

// Alphabetic only
Route::get('/category/{name}', $action)->whereAlpha('name');

// Alphanumeric
Route::get('/slug/{slug}', $action)->whereAlphaNumeric('slug');

// UUID format
Route::get('/product/{uuid}', $action)->whereUuid('uuid');

// ULID format  
Route::get('/order/{ulid}', $action)->whereUlid('ulid');

// Specific values only
Route::get('/lang/{lang}', $action)->whereIn('lang', ['en', 'es', 'fr']);

// Custom regex
Route::get('/post/{id}', $action)->where('id', '[0-9]+');

// Multiple constraints
Route::get('/user/{id}/post/{slug}', $action)
    ->where(['id' => '[0-9]+', 'slug' => '[a-z-]+']);
```

### 2. **Optional Parameters** ✅

Define optional route parameters:

```php
// Optional with ?
Route::get('/user/{name?}', function ($name = 'Guest') {
    return "Hello, $name!";
});

// With default value
Route::get('/posts/{page?}', function ($page = 1) {
    return "Page: $page";
})->defaults('page', 1);

// Multiple optional
Route::get('/search/{query?}/{page?}', function ($query = '', $page = 1) {
    return "Search: $query, Page: $page";
});
```

### 3. **Subdomain Routing** ✅

Route based on subdomains:

```php
// Static subdomain
Route::domain('admin.example.com')->group(function () {
    Route::get('/', function () {
        return 'Admin Dashboard';
    });
});

// Dynamic subdomain (multi-tenant)
Route::domain('{account}.example.com')->group(function () {
    Route::get('/dashboard', function ($account) {
        return "Dashboard for {$account}";
    });
});

// Multi-tenant app
Route::domain('{tenant}.app.com')
    ->middleware('tenant')
    ->group(function () {
        Route::resource('projects', ProjectController::class);
    });
```

### 4. **Fallback Routes** ✅

Handle 404 errors gracefully:

```php
// Simple fallback
Route::fallback(function () {
    return view('errors.404');
});

// With controller
Route::fallback([ErrorController::class, 'notFound']);

// Custom 404
Route::fallback(function () {
    return view('errors.404', [
        'message' => 'Page not found',
        'suggestions' => ['Home', 'Contact']
    ]);
});
```

### 5. **Custom Route Model Binding** ✅

Customize how models are resolved:

```php
// Bind by username instead of ID
Route::bind('user', function ($value) {
    return User::where('username', $value)->firstOrFail();
});

// Complex binding logic
Route::bind('post', function ($value) {
    $post = Post::where('slug', $value)
        ->orWhere('id', $value)
        ->firstOrFail();
    
    if (!$post->published) {
        abort(404);
    }
    
    return $post;
});

// Model binding with callback
Route::model('user', User::class, function ($value) {
    return User::where('username', $value)->firstOrFail();
});
```

### 6. **Route Macros** ✅

Create custom route methods:

```php
// Define a macro
Route::macro('softDelete', function ($uri, $controller) {
    return $this->post($uri, [$controller, 'softDelete'])
        ->name('soft-delete');
});

// Use the macro
Route::softDelete('/posts/{id}/soft-delete', PostController::class);

// Admin resource macro
Route::macro('adminResource', function ($name, $controller) {
    return $this->group([
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function () use ($name, $controller) {
        $this->resource($name, $controller);
    });
});

// Use it
Route::adminResource('users', UserController::class);
```

### 7. **Global Route Patterns** ✅

Set constraints globally:

```php
// In RouteServiceProvider or bootstrap
Route::pattern([
    'id' => '[0-9]+',
    'uuid' => '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}',
    'slug' => '[a-z0-9-]+',
    'username' => '[a-zA-Z0-9_-]+',
]);

// Now all {id}, {uuid}, {slug}, {username} params are automatically constrained
Route::get('/user/{id}', function ($id) {
    // {id} automatically uses [0-9]+ pattern
});
```

---

## Constraint Methods Reference

| Method | Pattern | Example |
|--------|---------|---------|
| `whereNumber()` | `[0-9]+` | Numbers only |
| `whereAlpha()` | `[a-zA-Z]+` | Letters only |
| `whereAlphaNumeric()` | `[a-zA-Z0-9]+` | Letters and numbers |
| `whereUuid()` | UUID format | Standard UUID |
| `whereUlid()` | ULID format | ULID string |
| `whereIn()` | Specific values | Enum-like constraint |
| `where()` | Custom regex | Any pattern |

---

## Practical Examples

### Multi-language Site

```php
Route::get('/{lang}/posts/{slug}', function ($lang, $slug) {
    app()->setLocale($lang);
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('posts.show', compact('post'));
})->whereIn('lang', ['en', 'es', 'fr', 'de'])
  ->whereAlphaNumeric('slug');
```

### User Profile with Username

```php
Route::get('/@{username}', function ($username) {
    $user = User::where('username', $username)->firstOrFail();
    return view('profile.show', compact('user'));
})->whereAlphaNumeric('username');
```

### Date-based URLs

```php
Route::get('/blog/{year}/{month}/{day}/{slug}', function ($year, $month, $day, $slug) {
    // Find post by date and slug
    return view('blog.post');
})->where([
    'year' => '[0-9]{4}',
    'month' => '[0-9]{2}',
    'day' => '[0-9]{2}',
    'slug' => '[a-z0-9-]+'
]);
```

### Multi-tenant SaaS

```php
Route::domain('{tenant}.myapp.com')
    ->middleware(['tenant', 'auth'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::resource('projects', ProjectController::class);
        Route::resource('users', UserController::class);
    });
```

### E-commerce with Filters

```php
Route::get('/products/{category?}/{subcategory?}', 
    function ($category = null, $subcategory = null) {
        return view('products.index', compact('category', 'subcategory'));
    }
)->whereAlpha(['category', 'subcategory']);
```

---

## Combining Features

```php
// Resource + Constraints + Middleware
Route::resource('products', ProductController::class)
    ->middleware('auth')
    ->whereNumber('product')
    ->except(['destroy']);

// Subdomain + API + Constraints
Route::domain('{tenant}.api.example.com')
    ->middleware(['api', 'tenant'])
    ->group(function () {
        Route::apiResource('projects', ProjectController::class)
            ->whereUuid('project');
    });

// Optional lang with defaults
Route::group([
    'prefix' => '{lang?}',
    'middleware' => 'localize'
], function () {
    Route::get('/', function ($lang = 'en') {
        return view('home');
    });
})->whereIn('lang', ['en', 'es', 'fr'])
  ->defaults('lang', 'en');
```

---

## Migration Tips

### Before
```php
Route::get('/user/{id}', function ($id) {
    if (!is_numeric($id)) {
        abort(404);
    }
    // ...
});
```

### After
```php
Route::get('/user/{id}', function ($id) {
    // ...
})->whereNumber('id'); // Validation automatic!
```

---

## Complete Feature List

✅ Resource Routes  
✅ API Resources  
✅ Route Groups  
✅ Named Routes  
✅ Route Model Binding  
✅ Middleware  
✅ Route Caching  
✅ **Parameter Constraints** (NEW)  
✅ **Optional Parameters** (NEW)  
✅ **Subdomain Routing** (NEW)  
✅ **Fallback Routes** (NEW)  
✅ **Custom Bindings** (NEW)  
✅ **Route Macros** (NEW)  
✅ **Global Patterns** (NEW)  

---

Your routing system is now **feature-complete** and on par with Laravel! 🎉

For examples, see `routes/advanced-examples.php`
