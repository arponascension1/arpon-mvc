<?php layout('layouts.app'); ?>

<?php section('content'); ?>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
        <h3 class="text-2xl font-bold text-center">Register for an account</h3>
        <form method="POST" action="/register">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="mt-4">
                <div>
                    <label class="block" for="name">Name</label>
                    <input type="text" name="name" placeholder="Name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="<?php echo old('name'); ?>" required>
                    <?php if (error('name')):
                        echo '<span class="text-xs text-red-500">' . error('name') . '</span>';
                    endif; ?>
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" value="<?php echo old('email'); ?>" required>
                    <?php if (error('email')):
                        echo '<span class="text-xs text-red-500">' . error('email') . '</span>';
                    endif; ?>
                </div>
                <div class="mt-4">
                    <label class="block">Password</label>
                    <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                    <?php if (error('password')):
                        echo '<span class="text-xs text-red-500">' . error('password') . '</span>';
                    endif; ?>
                </div>
                <div class="mt-4">
                    <label class="block">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                </div>
                <div class="flex items-baseline justify-between">
                    <button type="submit" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endSection(); ?>
