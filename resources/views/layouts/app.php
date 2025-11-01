<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arpon MVC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-semibold">Arpon MVC</a>
            <div>
                <?php if (auth()->check()): ?>
                    <a href="/profile" class="px-3 py-2 rounded hover:bg-gray-700">Profile</a>
                    <a href="/users" class="px-3 py-2 rounded hover:bg-gray-700">Users</a>
                    <a href="/logout" class="px-3 py-2 rounded hover:bg-gray-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    </form>
                <?php else: ?>
                    <a href="/login" class="px-3 py-2 rounded hover:bg-gray-700">Login</a>
                    <a href="/register" class="px-3 py-2 rounded hover:bg-gray-700">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <?php yieldSection('content'); ?>
    </div>
</body>
</html>
